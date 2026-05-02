<?php

class Router
{
    private $routes = [];

    private $route = '';

    public function __construct() {}

    public function run(string $url): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {
            if (array_key_exists('_method', $_POST)) {
                $method = $_POST['_method'];
            }
        }

        $this->route = (array_key_exists($url, $this->routes[$method]))
            ? CTRL.($this->routes[$method][$url]->getAction().'.php')
            : CTRL.'error/404.php';

        include $this->route;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function get(Route $route)
    {
        $this->routes['GET'][$route->getUrl()] = $route;
    }

    public function post(Route $route): void
    {
        $this->routes['POST'][$route->getUrl()] = $route;
    }

    public function patch(Route $route): void
    {
        $this->routes['PATCH'][$route->getUrl()] = $route;
    }

    public function put(Route $route): void
    {
        $this->routes['PUT'][$route->getUrl()] = $route;
    }

    public function delete(Route $route): void
    {
        $this->routes['DELETE'][$route->getUrl()] = $route;
    }
}
