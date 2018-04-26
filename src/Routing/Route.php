<?php

namespace Src\Routing;

class Route
{
    private $path;
    private $action;
    private $matches;

    public function __construct(string $path, string $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function match(string $url) : bool
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        $this->call($this->action, $this->matches);
        return true;
    }

    public function call(string $action, $matches)
    {
        $parts = explode('@', $action);
        $controller = $parts[0];
        $method = $parts[1];
        $controller = new $controller();
        if (!$this->matches) {
            return $controller->$method();
        } else {
            return $controller->$method($matches[0]);
        }
    }
}