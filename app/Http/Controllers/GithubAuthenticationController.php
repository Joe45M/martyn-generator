<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthenticationController extends Controller
{
    public function authenticate(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function verifyAuthentication()
    {
        try {
            $token = Socialite::driver('github')->user()->token;
            $user = Auth::user();
            $user->github_token = $token;
            $user->save();
            return redirect()->route('dashboard')->with('success', 'GitHub token saved successfully.');
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Failed to save GitHub token. Please try again later.');
        }
    }
}
