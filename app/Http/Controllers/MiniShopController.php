<?php

namespace App\Http\Controllers;

use App\Models\MiniShop;
use App\Models\MiniShopOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MiniShopController extends Controller
{
    public function index()
    {

        if (!Auth::check()) {
            return Inertia::render('Home');
        }
        
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

    public function orders()
    {

        $orders = Auth::user()->minishoporder;
        
        return Inertia::render("UserDashboard/Pages/MiniShop/Orders", [
            'orders' => $orders,
        ]);
    }

    public function checkUrl(Request $request)
    {
        $request->validate([
            'post_url' => 'required|url|max:255',
            'platform' => 'required|string|max:255',
        ]);

        $post_url = $request->input('post_url');
        $platform = strtolower($request->platform);

        $isValidPost = (
            ($platform === 'instagram' && strpos($post_url, 'instagram.com/p/') !== false) ||
            ($platform === 'facebook' && strpos($post_url, 'facebook.com/') !== false) ||
            ($platform === 'twitter' && strpos($post_url, 'twitter.com/') !== false) ||
            ($platform === 'linkedin' && strpos($post_url, 'linkedin.com/') !== false) ||
            ($platform === 'tiktok' && strpos($post_url, 'tiktok.com/') !== false)
        );

        $result = $isValidPost ? true : false;

        if (!$result) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid post URL for the selected platform',
                'status' => false
            ]);
        }

        return;
    }

    public function order(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email:rfc,dns|max:255|',
        ]);

        $likesValue = $request->likesValue;
        $commentsValue = $request->commentsValue;
        $sharesValue = $request->sharesValue;
        $savesValue = $request->savesValue;

        if ($likesValue == 0 && $commentsValue == 0 && $sharesValue == 0 && $savesValue == 0) {
            return redirect()->back()->withErrors([
                'message' => 'What do you want to buy, nothing? :)',
                'status' => false
            ]);
        }

        MiniShopOrders::create([
            "user_id" => Auth::user()->id,
            "email" => $request->email,
            "post_url" => $request->post_url,
            'likesValue' => $request->likesValue,
            'commentsValue' => $request->commentsValue,
            'sharesValue' => $request->sharesValue,
            'savesValue' => $request->savesValue,
            'likesUnits' => $request->likesUnits,
            'commentsUnits' => $request->commentsUnits,
            'sharesUnits' => $request->sharesUnits,
            'savesUnits' => $request->savesUnits,
            'total' => $request->total,
            'status' => "Processing",
        ]);
    }
}
