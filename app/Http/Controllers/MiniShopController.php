<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiniShopController extends Controller
{
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
}
