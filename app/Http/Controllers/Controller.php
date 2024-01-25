<?php

namespace App\Http\Controllers;

use App\Models\MiniShop;
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

    public function minishop()
    {

        $minishop = MiniShop::first();
        $likes = $minishop->likes_price;
        $comments = $minishop->comments_price;
        $shares = $minishop->shares_price;
        $saved = $minishop->saves_price;

        return Inertia::render("UserDashboard/Pages/MiniShop", [
            'likes_price' => $likes,
            'comments_price' => $comments,
            'shares_price' => $shares,
            'saves_price' => $saved,
        ]);
    }
}
