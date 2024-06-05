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
                throw new Exception("O Controller {$controllerName} não existe.");
            }

            $controllerInstance = new $controllerNamespace;

            if (!method_exists($controllerInstance, $methodName)) {
                throw new Exception("O método {$methodName} não existe no Controller {$controllerNamespace}.");
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
}
