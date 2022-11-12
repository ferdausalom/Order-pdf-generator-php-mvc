<?php

namespace App\Core;

use Exception;

class App
{
    // Assign as key, value pair 
    protected static $registry = [];

    // Bind key, value 
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    // Pull from the container 
    public static function get($key)
    {
        if (array_key_exists($key, static::$registry)) {
            return static::$registry[$key];
        }

        throw new Exception("{$key} key is not found in this dependency.", 1);
    }
}
