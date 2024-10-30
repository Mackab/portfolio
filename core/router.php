<?php
class Router {
    public static function start() {
        // Bepaal de controller en actie
        $controllerName = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) : 'Index';
        $actionName = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';

        // Laad de controller
        $controllerFile = __DIR__ . '/../controllers/' . strtolower($controllerName) . 'controller.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controllerClassName = $controllerName . 'Controller';
            $controller = new $controllerClassName();

            // Roep de actie aan
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