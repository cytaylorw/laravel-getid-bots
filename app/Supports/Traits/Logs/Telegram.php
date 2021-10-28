<?php

namespace App\Supports\Traits\Logs;

use Illuminate\Support\Facades\Log;

/**
 * Class BaseCommand.
 */
trait Telegram
{

    private function log(){
        return Log::channel('telegram');
    }
}