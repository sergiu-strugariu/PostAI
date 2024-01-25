<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        if (Auth::check()) {
            return Inertia::render('UserDashboard/Dashboard');
        }

        return Inertia::render('Home');
    }

    public function test() 
    {
        dd(1);
    }
}
