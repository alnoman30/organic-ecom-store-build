<?php

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
    });

});
