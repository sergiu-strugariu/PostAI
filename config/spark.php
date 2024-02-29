<?php

use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Spark Path
    |--------------------------------------------------------------------------
    |
    | This configuration option determines the URI at which the Spark billing
    | portal is available. You are free to change this URI to a value that
    | you prefer. You shall link to this location from your application.
    |
    */

    'path' => '/subscription',

    /*
    |--------------------------------------------------------------------------
    | Spark Middleware
    |--------------------------------------------------------------------------
    |
    | These are the middleware that requests to the Spark billing portal must
    | pass through before being accepted. Typically, the default list that
    | is defined below should be suitable for most Laravel applications.
    |
    */

    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | These configuration values allow you to customize the branding of the
    | billing portal, including the primary color and the logo that will
    | be displayed within the billing portal. This logo value must be
    | the absolute path to an SVG logo within the local filesystem.
    |
    */

    // 'brand' =>  [
    //     'logo' => realpath(__DIR__.'/../public/svg/billing-logo.svg'),
    //     'color' => 'bg-gray-800',
    // ],

    /*
    |--------------------------------------------------------------------------
    | Proration Behavior
    |--------------------------------------------------------------------------
    |
    | This value determines if charges are prorated when making adjustments
    | to a plan such as incrementing or decrementing the quantity of the
    | plan. This also determines proration behavior if changing plans.
    |
    */

    'prorates' => true,

    /*
    |--------------------------------------------------------------------------
    | Spark Date Format
    |--------------------------------------------------------------------------
    |
    | This date format will be utilized by Spark to format dates in various
    | locations within the billing portal, such as while showing invoice
    | dates. You should customize the format based on your own locale.
    |
    */

    'date_format' => 'F j, Y',

    /*
    |--------------------------------------------------------------------------
    | Spark Billables
    |--------------------------------------------------------------------------
    |
    | Below you may define billable entities supported by your Spark driven
    | application. The Paddle edition of Spark currently only supports a
    | single billable model entity (team, user, etc.) per application.
    |
    | In addition to defining your billable entity, you may also define its
    | plans and the plan's features, including a short description of it
    | as well as a "bullet point" listing of its distinctive features.
    |
    */

    'billables' => [
        'user' => [
            'model' => User::class,
            'trial_days' => 0,
            'default_interval' => 'monthly',
            'plans' => [
                [
                    'name' => 'Standard',
                    'short_description' => 'This is a short, human friendly description of the plan. Have 3 teams',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'pri_01hmtf6htyck7hk5axt6baa7fg'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'pri_01hmtf3pqa761r8xez8rdy93sk'),
                    'features' => [
                        'Feature 1',
                        'Feature 2',
                        'Feature 3',
                    ],
                    'archived' => false,
                ],
/*                 [
                    'name' => 'Large',
                    'short_description' => 'This is a short, human friendly description of the plan.',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'pri_01hn32h54nwmkywfw3h2y17y6n'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'pri_01hn32j33whq4zya7q8yn42vzy'),
                    'features' => [
                        'Feature 1',
                        'Feature 2',
                        'Feature 3',
                    ],
                    'archived' => false,
                ], */
            ],
        ],
    ],
];
