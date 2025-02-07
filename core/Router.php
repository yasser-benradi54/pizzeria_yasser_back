<?php
class Router {
    private $routes = [];

    public function add($route, $controller, $method) {
        $this->routes[$route] = ["controller" => $controller, "method" => $method];
    }

    public function dispatch($url) {
        if (isset($this->routes[$url])) {
            $controllerName = $this->routes[$url]['controller'];
            $methodName = $this->routes[$url]['method'];
            
            require_once "app/controllers/$controllerName.php";
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            echo "404 - Page not found";
        }
    }
}
?>