<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clientend.pages.index');
});

Route::get('/aboutus', function () {
    return view('clientend.pages.about');
});

Route::get('/project/hotel/sunwave', function () {
    return view('clientend.pages.projects.sunwave');
});

Route::get('/project-detail', function () {
    return view('clientend.pages.project-detail');
});

Route::get('/gallery', function () {
    return view('clientend.pages.gallery');
});

Route::get('/contact', function () {
    return view('clientend.pages.contact');
});