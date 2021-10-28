<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Your Line Bots
    |--------------------------------------------------------------------------
    |
    */
    'bots'                      => [
        'wmsbot' => [
            'token'             => env('LINEBOT_TOKEN', 'YOUR-BOT-TOKEN'),
            'secret'            => env('LINEBOT_SECRET', 'YOUR-BOT-SECRET'),
            'commands'          => [
                App\Bots\Line\Commands\EventCommand::class,
                App\Bots\Line\Commands\GetIdCommand::class,
            ],
        ],

        //        'mySecondBot' => [
        //            'token' => '123456:abc',
        //        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Bot Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the bots you wish to use as
    | your default bot for regular use.
    |
    */
    'default'                      => 'wmsbot',

];
