<?php

namespace App\Providers;

use App\Services\Cms\SiteContent;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(SiteContent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('clientend.*', function ($view) {
            $view->with('layout', $this->app->make(SiteContent::class)->page('layout'));
        });
    }
}
