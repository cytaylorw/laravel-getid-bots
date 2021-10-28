<?php

namespace App\Bots\Line;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot as Bot;

use App\Supports\Traits\CallToPrivate;
use App\Supports\Traits\Logs\Line as LineLog;

use function PHPUnit\Framework\isNull;

class LineBot
{
    use LineLog, CallToPrivate;

    private $bot;

    public function __construct($botName = null)
    {
        if(isNull($botName)) $botName = config('line.default');
        $secret = config('line.bots.'.$botName.'.secret');
        $token = config('line.bots.'.$botName.'.token');
        $httpClient = new CurlHTTPClient($token);
        $this->bot = new Bot($httpClient, ['channelSecret' => $secret]);
    }

    private function _replyText($event, $message) 
    {
        $reply = new TextMessageBuilder($message);
        $response = $this->bot->replyMessage($event['replyToken'], $reply);
        return $response;
    }

    private function _handleEvent($event) 
    {
        $messageType = $event['message']['type'];

        switch ($messageType) {
            case 'text':
                $this->handleText($event);
                break;
            
            default:
                # code...
                break;
        }
    }

    private function _handleText($event) 
    {
        if(LineEvent::isCommand($event))
        {
            $this->log()->info('Received command from LINE Webhook.');
            $this->log()->info('Line event.', [ $event ]);
            $command = LineCommandFactory::getCommand($event);
            $message = $command->getResponse();
            if($message) 
            {
                $this->log()->info('Bot response.', [ 
                    'name' => $command->getName(), 
                    'response' => $message,
                ]);
                $this->replyText($event, $message);
            }
        }
    }

}
