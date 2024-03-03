<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unsplash\HttpClient;
use Unsplash\Search;

class UnsplashApiController extends Controller
{
    private $connection;
    private $scopes = [
        'public',
        'read' /*
        'read_user',
        'write_user',
        'read_photos',
        'write_photos',
        'write_likes',
        'read_collections',
        'write_collections' */
    ];

/*     public function __construct()
    {
        $this->connection = HttpClient::init([
            'applicationId'    => '0NsI0DLBaYUT4A5T8q87Ps-NEPU-Pi36h0KabcQZCZM',
            'secret'           => 'O6jwSrUQF4H4pn0I8JHxzttKmo7o9-hNUoknuqajRTQ',
            'callbackUrl'      => route('unsplash-callback'),
            'utmSource'         => 'asd',
      ]);
    } */

    public function getOauth()
    {
        $this->connection =
            $connection = HttpClient::$connection->getConnectionUrl($this->scopes);

        return redirect($connection);
    }

    public function callback(Request $request)
    {
        $code = $request->code;
        if (!$code) return;

        dd(HttpClient::$connection->generateToken($code));

        // error: "expires" is not set on the token
        $test = Search::photos('flowers');

        // dd($test);
    }

    public function getPhotos()
    {
        HttpClient::init([
            'applicationId'    => '0NsI0DLBaYUT4A5T8q87Ps-NEPU-Pi36h0KabcQZCZM',
            'secret'           => 'O6jwSrUQF4H4pn0I8JHxzttKmo7o9-hNUoknuqajRTQ',
            'callbackUrl'      => route('unsplash-callback'),
            'utmSource'        => 'asd',
        ]);

        $search = 'forest';
        $page = 3;
        $per_page = 15;
        $orientation = 'landscape';

        dd(Search::photos($search, $page, $per_page, $orientation));

        return;
    }
}
