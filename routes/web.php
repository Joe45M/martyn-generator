<?php

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

Route::get('/github', function () {
    return Socialite::driver('github')->redirect();
})->name('socialite.github');

Route::get('/socialite/callback/github', function (\Illuminate\Http\Request $request) {
    try {
        $token = Socialite::driver('github')->user()->token;
        $user = Auth::user();
        $user->github_token = $token;
        $user->save();
        return redirect()->route('dashboard')->with('success', 'GitHub token saved successfully.');
    } catch (Exception $e) {
        return redirect()->route('dashboard')->with('error', 'Failed to save GitHub token. Please try again later.');
    }
});

require __DIR__.'/auth.php';
