<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ChangePassword;
use App\Livewire\Posts;

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/change-password', ChangePassword::class)->name('change-password');
    Route::post('/logout', function () { auth()->logout();request()->session()->invalidate();request()->session()->regenerateToken();return redirect()->route('login');})->name('logout');
    Route::get('/posts', Posts::class)->name('posts');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
