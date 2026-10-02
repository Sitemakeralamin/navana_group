<?php

namespace App\Http\Controllers;

use App\Services\Cms\SiteContent;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return $this->render('index', 'home');
    }

    public function about(): View
    {
        return $this->render('about', 'about');
    }

    public function sunwave(): View
    {
        return $this->render('projects.sunwave', 'sunwave');
    }

    public function projectDetail(): View
    {
        return $this->render('project-detail', 'project_detail');
    }

    public function gallery(): View
    {
        return $this->render('gallery', 'gallery');
    }

    public function contact(): View
    {
        return $this->render('contact', 'contact');
    }

    private function render(string $view, string $page): View
    {
        return view('clientend.pages.'.$view, ['content' => app(SiteContent::class)->page($page)]);
    }
}
