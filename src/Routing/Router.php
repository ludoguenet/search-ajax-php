<?php

namespace Src\Routing;

use Src\Routing\RoutingException\Exception;

class Router
{
    private $url;
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function get(string $path, string $action)
    {
        $route = new Route($path, $action);
        $this->routes['GET'][] = $route;
    }

    public function post(string $path, string $action)
    {
        $route = new Route($path, $action);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new Exception('No matching routes');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return true;
            }
        }
        throw new Exception('No matching routes');
    }
}