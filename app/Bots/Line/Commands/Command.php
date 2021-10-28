<?php

namespace App\Bots\Line\Commands;

class Command implements CommandInterface
{

    protected $event;
    protected $name = 'default';

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getResponse()
    {
        return 'I\'m WMS Line Bot';
    }
}