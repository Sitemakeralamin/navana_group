<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/aboutus', 'about');
    Route::get('/project/hotel/sunwave', 'sunwave');
    Route::get('/project-detail', 'projectDetail');
    Route::get('/gallery', 'gallery');
    Route::get('/contact', 'contact');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('account', [AccountController::class, 'edit'])->name('account.edit');
        Route::put('account', [AccountController::class, 'update'])->name('account.update');

        Route::get('pages/{page}', [SectionController::class, 'index'])->name('pages.show');
        Route::get('pages/{page}/{key}', [SectionController::class, 'edit'])->name('sections.edit');
        Route::put('pages/{page}/{key}', [SectionController::class, 'update'])->name('sections.update');

        Route::get('pages/{page}/{key}/items/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('pages/{page}/{key}/items', [ItemController::class, 'store'])->name('items.store');
        Route::get('items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
        Route::put('items/{item}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
        Route::patch('items/{item}/move/{direction}', [ItemController::class, 'move'])
            ->whereIn('direction', ['up', 'down'])
            ->name('items.move');
    });
});
