<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bots\Line\LineBot;

class LineBotController extends Controller
{
    
    /**
     * Reply LINE message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chat(Request $request)
    {

        if(!isset($request->events) || !isset($request->events[0])) return;
        
        LineBot::handleEvent($request->events[0]);

    }
}
