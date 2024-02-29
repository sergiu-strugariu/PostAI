<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    public function index()
    {   
        return Inertia::location(Socialite::driver('twitter-oauth-2')->redirect());
    }
    public function error()
    {
        dd('error');
    }
    public function callback(Request $request)
    {
        $user = Socialite::driver('Twitter')->user();
        dd($user);
    }
    public function login()
    {
        dd('login');
    }
    public function logout()
    {
        dd('logout');
    }
}
