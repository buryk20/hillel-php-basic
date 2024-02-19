<?php
use controllers\AuthController;
class Router
{
    private  array $routes = [];

    public function addRoute(string $path, array $rules): void
    {
        $this->routes[$path] = $rules;
    }

    public function processRoute(string $ulr, string $method)
    {
        $routes = $this->routes;

        if(!$routes) {
            throw new Exception('Routes not defined');
        }

        foreach ($routes as $routeUrl => $routeMethods) {
            if(strtolower($routeUrl) === $ulr) {
                $controllerAction = $routeMethods[$method] ?? null;
                break;
            }
        }

        if(!isset($controllerAction)) {
            header('HTTP/1.0 404 Not Found');
            echo "<p>Sorry, page not found</p>";
            exit;
        }

        [$controller, $action] = explode('@', $controllerAction);

        if(!isset($controller) && !isset($action)){
            throw new Exception('Invalid route');
        }

        require_once CONTROLLERS_DIR . $controller . '.php';
        $controllerClass = "controllers\\$controller";
        $controllerObject = new $controllerClass();
        $controllerObject->$action();
//        echo $controllerObject;
    }
}