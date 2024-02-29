<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Auth;

class TwitterAPIController extends Controller
{
    //
    public function getOauth(Request $request) {

        session('oauth_token', '');
        session('koauth_token_secretey', '');

        $connection = new TwitterOAuth("kwA8XtEyiPGOdkvN3gJtNgToA", "YXEnfShva7emo93e98VlqUnkvUqaoCfJ0ennqYLEkAYcOSCTPU");
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => 'http://192.168.0.176/twitter/callback'));

        session(['oauth_token' => $request_token['oauth_token']]);
        session(['oauth_token_secret' => $request_token['oauth_token_secret']]);
        
        return redirect($connection->url('oauth/authorize', ['oauth_token' => $request_token['oauth_token']]));
    }
    public  function callback(Request $request){
        $request_token['oauth_token'] = session('oauth_token');
        $request_token['oauth_token_secret'] = session('oauth_token_secret');

        $connection = new TwitterOAuth("kwA8XtEyiPGOdkvN3gJtNgToA","YXEnfShva7emo93e98VlqUnkvUqaoCfJ0ennqYLEkAYcOSCTPU", $request_token['oauth_token'], $request_token['oauth_token_secret']); // app as user   
        $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $request->all()['oauth_verifier']]);

        Auth::user()->currentTeam->socialData()->update([
            'twitter_access_token' => $access_token['oauth_token'],
            'twitter_access_token_secret' => $access_token['oauth_token_secret'],
        ]);


        return;
    }
}
