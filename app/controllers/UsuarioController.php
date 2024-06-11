<?php
namespace app\controllers;

class UsuarioController extends Controller
{
    public function index()
    {
        $this->perfil();
    }

    public function perfil()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            $this->redirect('/');
            exit();
        }

        $dadosUsuario = [
            'nome' => $_SESSION['usuario_nome'],
            'email' => $_SESSION['usuario_email'],
        ];
        $this->view('usuario/perfil', $dadosUsuario);
    }

    public function criarLista()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $produtosController = new ProdutoController();
        $produtos = $produtosController->listarProdutos();
        $this->view('usuario/criarLista', ['produtos' => $produtos]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioId = $_SESSION['usuario_id'];
            $listaNome = $_POST['listaNome'];
            $agendamento = $_POST['data'];

            $quantidades = [];

            // Iterar sobre os produtos para capturar as quantidades enviadas
            foreach ($produtos as $produto) {
                $produtoId = $produto->produto_id;
                if (isset($_POST[$produtoId]) && $_POST[$produtoId] > 0) {
                    $quantidades[$produtoId] = $_POST[$produtoId];
                }
            }

            $listaController = new ListaController();
            $listaController->criarLista($usuarioId, !empty($listaNome) ? $listaNome : null, !empty($agendamento) ? $agendamento : null, $quantidades);
        }
    }

    public function minhasListas()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $usuarioId = $_SESSION['usuario_id'];
        $listaController = new ListaController();

        $minhasListas = $listaController->minhasListas($usuarioId);
        $this->view('usuario/minhaslistas', ['minhasListas' => $minhasListas]);
    }

    public function detalhes($listaId)
    {
        $listaController = new ListaController();
        $listaDesc = $listaController->detalheLista($listaId);
        $this->view('usuario/detalhes', ['listaDesc' => $listaDesc]);
    }

}
