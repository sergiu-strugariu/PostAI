<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LinkedIn\Client;
use LinkedIn\Scope;
use LinkedIn\AccessToken;

class LinkedinApiController extends Controller
{
    private $connection;
    private $scopes = [
        'w_member_social',
        'profile',
        'openid',
        'email'
    ];

    public function __construct()
    {
        $this->connection = new Client(
            '86p2zo5y43mbnu',
            'ppKXPCLuu9U4W16x'
        );

        $this->connection->setRedirectUrl(route('linkedin-callback'));
    }

    public function getOauth()
    {
        $loginUrl = $this->connection->getLoginUrl($this->scopes);

        return redirect($loginUrl);
    }

    public function callback(Request $request)
    {
        if (!$request->code) return;

        // error: Refresh token is not available
        $accessToken = $this->connection->getAccessToken($request->code);
    }
}
