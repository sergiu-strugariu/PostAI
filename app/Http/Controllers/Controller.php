<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {   
        // dd(User::teamSubsciptionTresholdReached());
        Inertia::share("userTeamTreasholdReached",User::teamSubsciptionTresholdReached());
        if (Auth::check()) {
            return Inertia::render('UserDashboard/Dashboard', [
                'userIsSubscribed' => request()->user()->subscribed(),
                'userIsOnTrial' => request()->user()->onTrial()
            ]);
        }

        return Inertia::render('Home');
    }

    public function pricing()
    {
        if (Auth::check()) {
            return Inertia::render('UserDashboard/Pages/Pricing');
        }
        return Inertia::render('Pricing');
    }
}
