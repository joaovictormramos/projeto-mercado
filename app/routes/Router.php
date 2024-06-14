<?php

namespace App\Routes;

use Exception;

class Router
{
    const CONTROLLER_NAMESPACE = 'app\\controllers';

    public static function execute()
    {
        try {
            $uri = self::getUri();
            $controllerName = ucfirst($uri[0] ?? 'Home') . 'Controller';
            $methodName = $uri[1] ?? 'index';
            $params = array_slice($uri, 2);

            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controllerName;
            if (!class_exists($controllerNamespace)) {
                self::send404();
                return;
            }

            $controllerInstance = new $controllerNamespace;

            if (!method_exists($controllerInstance, $methodName)) {
                self::send404();
                return;
            }

            call_user_func_array([$controllerInstance, $methodName], $params);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private static function getUri()
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        return $uri ? explode('/', $uri) : [];
    }

    private static function send404()
    {
        http_response_code(404);
        include __DIR__ . '/../views/errors/404.php'; // Inclua aqui o caminho para sua página de erro 404 personalizada
        exit(); // Certifique-se de parar a execução após enviar o código 404 e mostrar a página de erro
    }
}
