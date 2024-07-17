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
            'nome' => $_SESSION['nome'],
            'email' => $_SESSION['email'],
        ];
        $this->view('usuario/perfil', $dadosUsuario);
    }

    public function criarLista()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $setorController = new SetorController();
        $setores = $setorController->getSetor();

        $produtosController = new ProdutoController();
        $produtosEstabelecimento = $produtosController->listarProdutos();
        $this->view('usuario/criarLista', ['produtosEstabelecimento' => $produtosEstabelecimento, 'setores' => $setores]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioId = $_SESSION['usuario_id'];
            $listaNome = $_POST['listaNome'];
            $agendamento = $_POST['data'];

            $quantidades = [];

            // Iterar sobre os produtos para capturar as quantidades enviadas
            foreach ($produtosEstabelecimento as $produto) {
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

        $usuarioId = $_SESSION['id'];
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
