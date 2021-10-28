<?php

namespace App\Bots\Line\Commands;

class GetIdCommand extends Command
{
    protected $name = 'getId';

    public function getResponse()
    {
        return $this->event['source'][$this->event['source']['type'].'Id'];
    }
}