<?php

use App\Core\App;
use Database\Connection;
use Jenssegers\Blade\Blade;
use App\Models\Cart;

if (!function_exists('d')) {
    function d($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '<pre>';
    }
}

if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        die(var_dump($data));
        echo '<pre>';
    }
}

if (!function_exists('DBConnect')) {
    function DBConnect()
    {
        return Connection::connect(App::get('config')['database']);
    }
}

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        // if ($data) {
        //     extract($data);
        // }

        // require "views/{$view}.php";

        $blade = new Blade(
            __DIR__ . './../views/',
            __DIR__ . './../storage/views/cache'
        );

        if ($blade->exists($view)) {
            echo $blade->make($view, $data)->render();
        } else {
            echo $blade->make('404', [])->render();
        }
    }
}

if (!function_exists('redirect')) {
    function redirect($url)
    {
        header("Location: {$url}");
    }
}

if (!function_exists('back')) {
    function back($url)
    {
        header("Location: /{$url}");
    }
}

// Requested uri
if (!function_exists('uri')) {
    function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}

// Base domain 
if (!function_exists('baseDomain')) {
    function baseDomain()
    {
        echo $_SERVER['SERVER_NAME'];
    }
}

// Public dir 
if (!function_exists('publicDir')) {
    function publicDir()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/public/';
    }
}

if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        return (new Cart)->itemCount(get_client_ip());
    }
}

if (!function_exists('sessionStart')) {
    function sessionStart()
    {
        ob_start();
        session_start();
    }
}

if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        // Function to get the client IP address
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = '';

        return str_replace(".", "", $ipaddress);
    }
}

if (!function_exists('session_for_cart')) {
    function guest_cart_session()
    {
        sessionStart();

        $ip = str_replace(".", "", get_client_ip());

        sessionSet('guest_cart', $ip);
        
    }
}

if (!function_exists('sessionSet')) {
    function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }
}

if (!function_exists('sessionGet')) {
    function sessionGet($name)
    {
        return $_SESSION[$name];
    }
}

if (!function_exists('sessionUnset')) {
    function sessionUnset($name)
    {
        unset($_SESSION[$name]);
    }
}
