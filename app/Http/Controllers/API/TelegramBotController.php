<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Telegram;

class TelegramBotController extends Controller
{
    
    /**
     * Set webhook.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setWebhook(Request $request)
    {
        $defaultBot = config('telegram.default');
        $webhookUrl = config('telegram.bots.'.$defaultBot.'.webhook_url');
        $response = Telegram::setWebhook(['url' => $webhookUrl]);
        dd([
            'url' => $webhookUrl, 
            "resonse" => $response
        ]);

    }

    /**
     * Remove webhook.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeWebhook(Request $request)
    {
        $response = Telegram::removeWebhook();
        dd([
            "resonse" => $response
        ]);

    }

    /**
     * Reply LINE message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        $update = Telegram::commandsHandler(true);
    }
}
