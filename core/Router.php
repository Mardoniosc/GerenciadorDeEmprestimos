<?php

class Router {
    public static function run($pdo) {
        $basePath = '/GerenciadorDeEmprestimos/public';

        $uri = str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $uri = trim($uri, '/');

        $url = explode('/', $uri);

        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'AuthController';

        $method = $url[1] ?? 'login';

        $controllerFile = '../controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName($pdo);

                if (method_exists($controller, $method)) {
                    $params = array_slice($url, 2);
                    call_user_func_array([$controller, $method], $params);
                    return;
                }
            }
        }

        http_response_code(404);
        header("Location: " . BASE_URL . "errors/notFound");
    }
}
