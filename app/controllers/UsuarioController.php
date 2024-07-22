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

        $userData = [
            'nome' => $_SESSION['nome'],
            'email' => $_SESSION['email'],
        ];
        $this->view('usuario/perfil', $userData);
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
            $userID = $_SESSION['id'];

            $listName = $_POST['listName'];
            $appointmentDay = $_POST['appointmentDay'];

            //$quantidades = [];
            $userLists = new ListaController();
            $userLists = $userLists->minhasListas($userID);
            $listQuantity = count($userLists);

            //Se o nome vier vazio do POST, então o nome receberá o nome padrão 'Lista' +  o número de listas do usuário + 1
            if ($listName == "") {
                $listName = "Lista " . $listQuantity + 1;
            }

            if ($appointmentDay == "") {
                $appointmentDay = getdate();
                $appointmentDay = $appointmentDay['year'] . '/' . $appointmentDay['mon'] . '/' . $appointmentDay['mday'];
            }

            $listController = new ListaController();
            $listController->criarLista($userID, $listName, $appointmentDay);
        }
    }

    public function minhasListas()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $userID = $_SESSION['id'];
        $listController = new ListaController();
        $userLists = $listController->minhasListas($userID);
        $appointmentDay = getdate();
        $appointmentDay = $appointmentDay['year'] . '/' . $appointmentDay['mon'] . '/' . $appointmentDay['mday'];
        $this->view('usuario/minhaslistas', ['minhasListas' => $userLists]);
    }

    public function detalhes($listID)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $listController = new ListaController();
        $getListDetails = $listController->detalheLista($listID);
        $this->view('usuario/detalhes', ['listaDesc' => $getListDetails]);
    }

    public function deletarLista()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $listID = $_POST['listID'];
        $listController = new ListaController();
        $listController->deleteList($listID);
        $this->redirect('/usuario/minhaslistas');
    }

    public function editarLista()
    {
        var_dump($_POST);
    }

}
