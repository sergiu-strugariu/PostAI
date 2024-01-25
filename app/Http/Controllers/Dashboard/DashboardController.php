<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MiniShop;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        session()->flash('flash.banner', 'Admin: Go back to ');
        return Inertia::render('AdminDashboard/Dashboard');
    }

    public function minishop()
    {
        // session()->flash('flash.banner', 'Admin: Go back to ');

        $minishop = MiniShop::first();
        $likes = $minishop->likes_price;
        $comments = $minishop->comments_price;
        $shares = $minishop->shares_price;
        $saved = $minishop->saves_price;

        return Inertia::render('AdminDashboard/Pages/MiniShop', [
            'likes_price' => $likes,
            'comments_price' => $comments,
            'shares_price' => $shares,
            'saves_price' => $saved,
        ]);
    }

    public function minishopStore(Request $request)
    {
        $minishop = MiniShop::first();

        if ($request->likes_price !== null) {
            $minishop->likes_price = $request->likes_price;
        }

        if ($request->comments_price !== null) {
            $minishop->comments_price = $request->comments_price;
        }

        if ($request->shares_price !== null) {
            $minishop->shares_price = $request->shares_price;
        }

        if ($request->saves_price !== null) {
            $minishop->saves_price = $request->saves_price;
        }

        $minishop->save();

        session()->flash('flash.banner', 'Prices has been updated succesfully!');
        return;
    }
}
