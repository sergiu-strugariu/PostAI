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
        'profile',

    ];

    public function __construct()
    {
        $this->connection = new Client(
            '86zk0gugysvjqz',
            'IcoXfQZUSzeCqe8Q'
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


        return $accessToken;
    }
}
