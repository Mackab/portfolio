<?php
class Router {
    public static function start() {
        $controllerName = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) : 'Index';
        $actionName = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';

        $controllerFile = __DIR__ . '/../controllers/' . strtolower($controllerName) . 'controller.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controllerClassName = $controllerName . 'Controller';
            $controller = new $controllerClassName();

            if (method_exists($controller, $actionName)) {
                $controller->$actionName();
            } else {
                die("Action not found: $actionName");
            }
        } else {
            die("Controller file not found: $controllerFile");
        }
    }
}