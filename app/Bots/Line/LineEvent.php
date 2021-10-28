<?php

namespace App\Bots\Line;

class LineEvent
{
    public static function isCommand($event) {
        try {
            return mb_substr($event['message']['text'], 0, 1, 'utf-8') === '/';
        } catch (\Throwable $th) {
            return false;
        }
    }

}