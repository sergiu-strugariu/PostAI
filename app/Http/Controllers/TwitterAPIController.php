<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAPIController extends Controller
{
    //
    public function getOauth() {
        $connection = new TwitterOAuth("VjBkVGRSVEs5QTJTQVBXWnc1Y046MTpjaQ", "dVZXjworyaX-rZe-j4n4DdbllSsxFsgX3j2D1OL_swWrmtpqr-");
        $request_token = $connection->oauth('oauth/request_token', ['oauth_callback' => urlencode("http://angelino.mooo.com/twitter/callback")]);
        session(['oauth_token' => $request_token['oauth_token']]);
        session(['oauth_token_secret' => $request_token['oauth_token_secret']]);
        $url = $connection->url('oauth/authorize', ['oauth_token' => $request_token['oauth_token']]);
        return redirect($url);
    }
    public  function callback(Request $request){
        $request_token = [];
        $request_token['oauth_token'] = session('oauth_token');
        $request_token['oauth_token_secret'] = session('oauth_token_secret');

/*         if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
            dd("Error");
        }*/

        $connection = new TwitterOAuth(env('TWITTER_CLIENT_ID'), env('TWITTER_CLIENT_SECRET_ID'), env('TWITTER_ACCSES_TOKEN'));
        $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $request->input('oauth_verifier')]);
        session(['access_token' => $access_token]); 

        return;
    }
}
