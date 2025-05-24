<?php

use App\Http\Controllers\GithubAuthenticationController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Dashboard;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::view('/', 'welcome');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/github', [GithubAuthenticationController::class, 'authenticate'])->name('socialite.github')
->middleware('auth');

Route::get('/socialite/callback/github', [GithubAuthenticationController::class, 'verifyAuthentication'])
    ->middleware('auth');




require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
