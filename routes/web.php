<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homePage'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 1 ) {
            return redirect()->route('admin.dashboard');
        }

        return view('user.dashboard'); // user dashboard
    })->name('dashboard');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard'); // admin dashboard
        })->name('admin.dashboard');
        
        Route::get('/admin/dashboard/blog-category', [BlogController::class, 'blogCategory'])->name('admin.blog.category');

        Route::get('/admin/dashboard/blog-category-create', function () {
            return view('admin.blog.blog_category_create'); // admin dashboard blog
        })->name('admin.blog.category.create');

        Route::post('/admin/dashboard/blog-category-create/store', [BlogController::class, 'CategoryStore'])->name('admin.blog.category.store');

        
    });

});
