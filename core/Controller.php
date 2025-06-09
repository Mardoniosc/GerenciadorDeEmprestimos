<?php

class Controller {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    protected function loadView($viewName, $viewData = []) {
        extract($viewData);
    
        $viewPath = __DIR__ . '/../views/' . $viewName . '.php';
    
        if (strpos($viewName, '/') !== false) {
            $viewPath = __DIR__ . '/../views/' . str_replace('/', DIRECTORY_SEPARATOR, $viewName) . '.php';
        }
    
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "A view {$viewName} não foi encontrada.";
        }
    }
    
}
