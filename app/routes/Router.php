<?php
namespace app\routes;

use app\helpers\Request;
use app\helpers\Uri;
use Exception;

class Router
{

    const CONTROLLER_NAMESPACE = 'app\\controllers';

    public static function load(string $controller, string $method)
    {
        try {
            //verifica se o controller existe
            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;
            if (!class_exists($controllerNamespace)) {
                throw new \Exception("O Controller {$controller} não existe");
            }

            $controllerInstance = new $controllerNamespace;

            if (!method_exists($controllerInstance, $method)) {
                throw new Exception("O método {$method} não existe no Controller {$controller}");
            }

            $controllerInstance->$method();

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function routes(): array
    {
        return [
            'get' => [
                '/' => fn() => self::load('HomeController', 'index'),
                '/contact' => fn() => self::load('ContactController', 'index'),
                '/auth/cadastrar' => fn() => self::load('AuthController', 'formCadastrarUsuario'),
                '/auth/login' => fn() => self::load('AuthController', 'formLogin'),
                '/auth/logout' => fn() => self::load('AuthController', 'logout'),
                //'/auth/recuperarsenha' => fn() => self::load('AuthController', 'formRecuperarSenha'),
                '/usuario/perfil' => fn() => self::load('UsuarioController', 'dashboard'),
                '/usuario/minhaslistas' => fn() => self::load('UsuarioController', 'minhasListas'),
                '/usuario/criarlista' => fn() => self::load('ListaController', 'formCriaLista'),
                '/produto/cadastrarproduto' => fn() => self::load('ProdutoController', 'formCadastrarProduto'),
                '/admin' => fn() => self::load('AdminController', 'painelAdmin'),
                '/admin/gerenciarestabelecimento' => fn() => self::load('EstabelecimentoController', 'formGerenciarEstabelecimento'),
                '/admin/gerenciarprodutos' => fn() => self::load('EstabelecimentoController', 'formGerenciarProdutos'),
                //'/listar' => fn() => self::load('ProdutoController', 'exibirProdutos'),
            ],
            'post' => [
                '/contact' => fn() => self::load('ContactController', 'store'),
                '/produto/cadastrarproduto' => fn() => self::load('AdminController', 'cadastrarProduto'),
                '/auth/cadastrar' => fn() => self::load('AuthController', 'cadastrar'),
                '/auth/login' => fn() => self::load('AuthController', 'login'),
                //'/auth/recuperarsenha' => fn() => self::load('AuthController', 'recuperarSenha'),
                '/admin/cadastrarestabelecimento' => fn() => self::load('EstabelecimentoController', 'cadastrarEstabelecimento'),

            ],
        ];
    }

    public static function execute()
    {
        try {
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::get('path');

            if (!isset($routes[$request])) {
                throw new Exception("A rota não existe. ");
            }

            if (!array_key_exists($uri, $routes[$request])) {
                throw new Exception("A rota não existe. ");
            }

            $router = $routes[$request][$uri];

            if (!is_callable($router)) {
                throw new Exception("A rota {$uri} não está disponível. ");
            }

            $router();

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
