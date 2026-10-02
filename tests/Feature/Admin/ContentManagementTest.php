<?php

namespace Tests\Feature\Admin;

use App\Models\PageSection;
use App\Models\SectionItem;
use App\Models\User;
use Database\Seeders\ContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ContentManagementTest extends TestCase
{
    use RefreshDatabase;

    private const UPLOAD_DIR = 'storage/framework/testing/cms-uploads';

    protected function setUp(): void
    {
        parent::setUp();

        config(['cms.upload_dir' => self::UPLOAD_DIR]);
        $this->seed(ContentSeeder::class);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory(base_path(self::UPLOAD_DIR));

        parent::tearDown();
    }

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->forceFill(['is_admin' => true])->save();

        return $user;
    }

    /**
     * The test app outlives a single request, so drop request-scoped caches
     * (SiteContent) the way a real new request would.
     */
    private function freshRequest(): static
    {
        $this->app->forgetScopedInstances();

        return $this;
    }

    private function section(string $page, string $key): PageSection
    {
        return PageSection::where(['page' => $page, 'key' => $key])->firstOrFail();
    }

    public function test_every_public_page_renders_seeded_content(): void
    {
        $this->get('/')->assertOk()->assertSee('Who we are ?')->assertSee('MD. Ziaul Khan');
        $this->get('/aboutus')->assertOk()->assertSee('We Are Nanova Groups');
        $this->get('/project/hotel/sunwave')->assertOk()->assertSee('CATEGORY OF OWNERSHIP');
        $this->get('/project-detail')->assertOk()->assertSee('BASEMENT FLOOR PLAN');
        $this->get('/gallery')->assertOk()->assertSee('Our Gallery');
        $this->get('/contact')->assertOk()->assertSee('Corporate Office');
    }

    public function test_seeder_does_not_overwrite_admin_edits(): void
    {
        $this->section('home', 'about')->update(['title' => 'Edited heading']);

        $this->seed(ContentSeeder::class);

        $this->assertSame('Edited heading', $this->section('home', 'about')->title);
        $this->assertSame(3, $this->section('home', 'hero')->items()->count());
    }

    public function test_guests_are_sent_to_login(): void
    {
        $this->get('/admin')->assertRedirect(route('admin.login'));
        $this->get(route('admin.sections.edit', ['home', 'hero']))->assertRedirect(route('admin.login'));
    }

    public function test_non_admin_users_cannot_open_the_panel(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/admin')
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }

    public function test_only_admin_accounts_can_log_in(): void
    {
        $admin = $this->admin();
        $user = User::factory()->create();

        $this->post(route('admin.login.attempt'), ['email' => $user->email, 'password' => 'password'])
            ->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->post(route('admin.login.attempt'), ['email' => $admin->email, 'password' => 'wrong'])
            ->assertSessionHasErrors('email');

        $this->post(route('admin.login.attempt'), ['email' => $admin->email, 'password' => 'password'])
            ->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_pages_render(): void
    {
        $this->actingAs($this->admin());

        $this->get('/admin')->assertOk()->assertSee('Header &amp; footer', false);
        $this->get(route('admin.account.edit'))->assertOk();

        foreach (config('cms.pages') as $page => $definition) {
            $this->get(route('admin.pages.show', $page))->assertOk();

            foreach ($definition['sections'] as $key => $section) {
                $this->get(route('admin.sections.edit', [$page, $key]))->assertOk();

                if (isset($section['items'])) {
                    $this->get(route('admin.items.create', [$page, $key]))->assertOk();
                }
            }
        }

        $this->get(route('admin.items.edit', SectionItem::first()))->assertOk();
    }

    public function test_unknown_page_or_section_is_not_found_and_creates_nothing(): void
    {
        $this->actingAs($this->admin());
        $before = PageSection::count();

        $this->get(route('admin.pages.show', 'missing'))->assertNotFound();
        $this->get(route('admin.sections.edit', ['home', 'missing']))->assertNotFound();
        $this->get(route('admin.items.create', ['home', 'about']))->assertNotFound();

        $this->assertSame($before, PageSection::count());
    }

    public function test_section_text_change_appears_on_the_site(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.sections.update', ['home', 'about']), [
                'title' => 'Who we really are',
                'body' => 'Rewritten company profile.',
                'button_text' => 'Our partners',
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $section = $this->section('home', 'about');
        $this->assertSame($admin->id, $section->updated_by);
        $this->assertSame('Our partners', $section->value('button_text'));
        $this->assertSame('assets/main-logo.png', $section->image, 'Image must survive a save without a new upload.');

        $this->get('/')->assertSee('Who we really are')->assertSee('Rewritten company profile.')->assertSee('Our partners');
    }

    public function test_replacing_an_image_deletes_only_previous_uploads(): void
    {
        $this->actingAs($this->admin());
        $route = route('admin.sections.update', ['about', 'intro']);
        $themeImage = $this->section('about', 'intro')->image;

        $this->put($route, ['image' => UploadedFile::fake()->image('first.jpg')])->assertSessionHasNoErrors();
        $first = $this->section('about', 'intro')->image;

        $this->assertStringStartsWith(self::UPLOAD_DIR.'/', $first);
        $this->assertFileExists(base_path($first));
        $this->assertFileExists(base_path($themeImage), 'Original theme files are never deleted.');
        $this->get('/aboutus')->assertSee(asset($first));

        $this->put($route, ['image' => UploadedFile::fake()->image('second.png')])->assertSessionHasNoErrors();
        $second = $this->section('about', 'intro')->image;

        $this->assertFileDoesNotExist(base_path($first));
        $this->assertFileExists(base_path($second));

        $this->put($route, ['remove_image' => '1'])->assertSessionHasNoErrors();

        $this->assertNull($this->section('about', 'intro')->image);
        $this->assertFileDoesNotExist(base_path($second));
    }

    public function test_unsafe_uploads_are_rejected(): void
    {
        $this->actingAs($this->admin());

        $svg = UploadedFile::fake()->createWithContent('logo.svg', '<svg onload="alert(1)"></svg>');
        $this->put(route('admin.sections.update', ['layout', 'brand']), ['image' => $svg])
            ->assertSessionHasErrors('image');

        $this->put(route('admin.sections.update', ['sunwave', 'intro']), ['brochure' => UploadedFile::fake()->create('plan.exe', 10)])
            ->assertSessionHasErrors('brochure');
    }

    public function test_items_can_be_added_hidden_reordered_and_deleted(): void
    {
        $this->actingAs($this->admin());
        $team = $this->section('home', 'team');

        $this->post(route('admin.items.store', ['home', 'team']), [
            'title' => 'Nusrat Jahan',
            'subtitle' => 'Accounts Officer',
            'image' => UploadedFile::fake()->image('nusrat.jpg'),
            'is_active' => '1',
        ])->assertRedirect(route('admin.sections.edit', ['home', 'team']));

        $member = $team->items()->where('title', 'Nusrat Jahan')->firstOrFail();
        $this->assertSame(11, $member->sort_order);
        $this->get('/')->assertSee('Nusrat Jahan');

        $this->patch(route('admin.items.move', [$member, 'up']));
        $this->assertSame(['Nusrat Jahan', 'Mahfijur Rahman Jewel'], $team->items()->pluck('title')->slice(-2)->values()->all());

        $this->put(route('admin.items.update', $member), ['title' => 'Nusrat Jahan', 'subtitle' => 'Accounts Officer', 'is_active' => '0']);
        $this->freshRequest()->get('/')->assertDontSee('Nusrat Jahan');

        $upload = $member->fresh()->image;
        $this->delete(route('admin.items.destroy', $member))->assertRedirect();

        $this->assertModelMissing($member);
        $this->assertFileDoesNotExist(base_path($upload));
    }

    public function test_menu_links_belong_to_a_category(): void
    {
        $this->actingAs($this->admin());
        $land = $this->section('layout', 'project_menu')->items()->where('title', 'Land')->firstOrFail();

        $this->post(route('admin.items.store', ['layout', 'project_menu', 'parent' => $land->id]), [
            'title' => 'Purbachal Plots',
            'link_url' => '/project/land/purbachal',
            'is_active' => '1',
        ])->assertSessionHasNoErrors();

        $this->assertSame($land->id, SectionItem::where('title', 'Purbachal Plots')->value('parent_id'));
        $this->get('/')->assertSee('Purbachal Plots')->assertSee('/project/land/purbachal');

        $foreignParent = $this->section('home', 'team')->items()->first();
        $this->post(route('admin.items.store', ['layout', 'project_menu', 'parent' => $foreignParent->id]), ['title' => 'x'])
            ->assertNotFound();
    }

    public function test_script_links_are_neutralised_on_the_site(): void
    {
        $this->actingAs($this->admin())
            ->put(route('admin.sections.update', ['layout', 'contact']), ['link_url' => 'javascript:alert(document.cookie)']);

        $this->get('/')->assertDontSee('alert(document.cookie)', false);
    }
}
