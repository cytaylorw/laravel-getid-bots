<?php

namespace App\Supports\Traits;

trait CallToPrivate{

    public static $PREFIX = '_';
    
    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $methodName = CallToPrivate::$PREFIX.$method;
        return $this->$methodName(...$parameters);
    }

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
        return (new static)->$methodName(...$parameters);
    }
}