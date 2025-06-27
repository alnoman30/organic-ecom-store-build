<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homePage'])->name('home');
Route::get('/blog', [HomeController::class, 'blogPage'])->name('blog');

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
        

        // BLOG CATEGORY ROUTES
        Route::get('/admin/dashboard/blog-category', [BlogController::class, 'blogCategory'])->name('admin.blog.category');
        Route::get('/admin/dashboard/blog-category-create', function () {
            return view('admin.blog.blog_category_create'); // admin dashboard blog
        })->name('admin.blog.category.create');
        Route::post('/admin/dashboard/blog-category-create/store', [BlogController::class, 'CategoryStore'])->name('admin.blog.category.store');
        Route::get('/admin/dashboard/blog-category-edit/{id}', [BlogController::class, 'categoryEdit'])->name('admin.blog.category.edit');
        Route::post('/admin/dashboard/blog-category-update/{id}', [BlogController::class, 'categoryUpdate'])->name('admin.blog.category.update');
        Route::delete('/admin/dashboard/blog-category-delete/{id}', [BlogController::class, 'categoryDelete'])->name('admin.blog.category.delete');


        //BLOG ROUTES
        Route::get('/admin/dashboard/blogs', [BlogController::class, 'blogs'])->name('admin.blogs');
        Route::get('/admin/dashboard/blogs-create', [BlogController::class, 'blogsCreate'])->name('admin.blogs.create');
        Route::post('/admin/dashboard/blogs-create/store', [BlogController::class, 'blogStore'])->name('admin.blogs.store');
        Route::get('/admin/dashboard/blogs-edit/{id}', [BlogController::class, 'blogEdit'])->name('admin.blogs.edit');
        Route::post('/admin/dashboard/blogs-update/{id}', [BlogController::class, 'blogUpdate'])->name('admin.blogs.update');
        Route::delete('/admin/dashboard/blogs/delete/{id}', [BlogController::class, 'blogDelete'])->name('admin.blogs.delete');
        Route::get('/blog/{slug}', [BlogController::class, 'blogShow'])->name('blog.show');

        
    });

});
