<?php

use App\Livewire\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Page1;
use App\Livewire\Page2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', Home::class)
        ->name('home');

    Route::get('/page/1', Page1::class)
        ->name('page.1');

    Route::get('/page/2', Page2::class)
        ->name('page.2');

    Route::delete('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
