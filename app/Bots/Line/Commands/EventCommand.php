<?php

namespace App\Bots\Line\Commands;

class EventCommand extends Command
{
    protected $name = 'event';

    public function getResponse()
    {
        return json_encode($this->event , JSON_PRETTY_PRINT);
    }
}