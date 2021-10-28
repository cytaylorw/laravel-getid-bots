<?php

namespace App\Bots\Line\Commands;

interface CommandInterface {
    public function getName();
    public function getResponse();
}
