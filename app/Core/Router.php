<?php

namespace App\Core;

use Exception;

class Router
{

    // Put all route here 
    public $routes = [
        "GET" => [],
        "POST" => []
    ];

    // Load routes and instantiate router
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    // Take GET route 
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    // Take POST route 
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    // Pass the route and trigger the controller->method 
    public function handle($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callMethod(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

        return redirect("/404");
    }

    // Devide controller, method and trigger it 
    public function callMethod($controller, $method)
    {
        $controller = "App\Controllers\\{$controller}";
        $cont = new $controller;
        return $cont->$method();
    }
}
