<?php

namespace App\Bots\Line;

use App\Bots\Line\Commands\Command;
use App\Supports\Traits\CallToPrivate;

class LineCommandFactory
{

    use CallToPrivate;

    private $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    private function _getCommand()
    {
        $key = mb_substr($this->event['message']['text'], 1, null, 'utf-8');
        $userCommand = mb_strtolower($key);
        
        $defaultBot = config('line.default');
        $commands = config('line.bots.'.$defaultBot.'.commands');
        
        foreach ($commands as $command) {
            $instance = new $command($this->event);
            if(mb_strtolower($instance->getName()) === $userCommand ) return $instance;
        }
        return new Command($this->event);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    // public function __call($method, $parameters)
    // {
    //     return $this->$method(...$parameters);
    // }

    /**
     * Handle dynamic static method calls into the method.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $methodName = CallToPrivate::$PREFIX.$method;
        return (new static(...$parameters))->$methodName();
    }
}