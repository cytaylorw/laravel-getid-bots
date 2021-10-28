<?php

namespace App\Supports\Traits\Logs;

use Illuminate\Support\Facades\Log;

trait Line{

    private function log()
    {
        return Log::channel('line');
    }
}