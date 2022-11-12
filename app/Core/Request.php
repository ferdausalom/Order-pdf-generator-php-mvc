<?php

namespace App\Core;

class Request
{
    // Get uri without "/" 
    public static function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    // Get request method 
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // Get values from request 
    public static function values()
    {
        return $_REQUEST;
    }

    // Get file from request 
    public static function file()
    {
        return $_FILES;
    }
}
