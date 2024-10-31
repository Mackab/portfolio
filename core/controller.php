<?php


class Controller {
    public function render($view, $data = []) {
        // Begin met het instellen van het pad naar de view
        $viewPath = __DIR__ . '/../views/' . $view . '.view.php';
        
        // Controleer of de view bestaat
        if (file_exists($viewPath)) {
            // Extract de data naar variabelen
            extract($data);
            // Laad de view
            require_once $viewPath;
        } else {
            // Handle de fout als de view niet gevonden kan worden
            throw new Exception("View file not found: " . $viewPath);
        }
    }

    public function loadModel($model) {
        $modelPath = __DIR__ . '/../models/' . strtolower($model) . 'model.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            $modelName = ucfirst($model) . 'Model';
            return new $modelName();
        } else {
            throw new Exception("Model file not found: " . $modelPath);
        }
    }
}
