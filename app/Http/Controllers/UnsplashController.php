<?php

namespace App\Http\Controllers;

use Unsplash\HttpClient;
use Illuminate\Http\Request;

class UnsplashController extends Controller
{
    private $clinet =  HttpClient::init([
        'applicationId'	=> 't2c3ZhnTlHpeYEQKNPchwumbQthTTnm0ADcdkYuFLDE',
        'secret'	=> 'cod0yWuCvdLZOBjbYI42_Yw9tTVf7jwHdspALZQb85Q',
        'callbackUrl'	=> ' ',
        'utmSource' => 'Tes'
    ]);
}
