<?php

namespace app\controllers;

class AdminController extends Controller
{
    //Chama o painel de administrador.
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $nome = $_SESSION['nome'];
            $idAdmin = $_SESSION['id'];
            $isAdmin = $_SESSION['isAdmin'];
            $this->view('admin/painelAdmin', ['idAdmin' => $idAdmin]);
        }
    }

    //Usa o método exibirEstabelecimentos de EstabelecimentoController para enviar à view gerenciarEstabelecimento todos os estabelecimentos.
    public function gerenciarEstabelecimento()
    {
        $estabelecimentoController = new EstabelecimentoController();
        $estabelecimentos = $estabelecimentoController->exibirEstabelecimento();
        $this->view('admin/gerenciarEstabelecimento', ['estabelecimentos' => $estabelecimentos]);
    }

    //Usa o método exibirProdutos de EstabelecimentoController para enviar à view editarestoque os produtos do estabelecimento utilizando o id.
    public function editarEstoque()
    {
        $idEstabelecimento = $_POST['idEstabelecimento'];
        $nomeEstabelecimento = $_POST['estabelecimento'];
        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $estabelecimentoProdutos = $estabelecimentoProdutoController->exibirProdutos($idEstabelecimento);

        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $produtosACadastrar = $estabelecimentoProdutoController->produtosNaoCadastrados($idEstabelecimento);

        $this->view('admin/editarEstoque', ['estabelecimentoProdutos' => $estabelecimentoProdutos, 'produtosACadastrar' => $produtosACadastrar, 'estabelecimentoId' => $idEstabelecimento, 'nomeEstabelecimento' => $nomeEstabelecimento]);

    }

    public function gerenciarProduto()
    {
        $setores = new SetorController();
        $setores = $setores->getSetor();
        $this->view('admin/gerenciarProduto', ['setores' => $setores]);
    }

    public function editarSetor()
    {
        $setorId = $_POST['setorId'];
        $setorNome = $_POST['setorNome'];
        $produtoController = new ProdutoController();
        $produtosPorSetor = $produtoController->listarProdutos();
        $this->view('/admin/editarSetor', ['setorId' => $setorId, 'setorNome' => $setorNome, 'produtosPorSetor' => $produtosPorSetor]);
    }

    public function cadastrarProduto()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $setorNome = $_GET['setorNome'];
            $setorId = $_GET['setorId'];
            $marcasController = new MarcaController();
            $marcas = $marcasController->getMarcas();
            $this->view('admin/cadastrarproduto', ['marcas' => $marcas, 'setorNome' => $setorNome, 'setorId' => $setorId]);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST)) {
                $produto = $_POST['produto'];
                $marcaId = $_POST['marcaId'];
                $medida = $_POST['medida'];
                $unidadeMedida = $_POST['unidadeMedida'];
                $setorId = $_POST['setorId'];
                if (isset($_FILES['imgproduto'])) {
                    $img = $_FILES['imgproduto'];
                    $name = str_replace(' ', '', $_POST['produto'] . $_POST['marcaId'] . '.');
                    $extensao = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
                    $pasta = '/opt/lampp/htdocs/public/assets/images/imagens_produtos/';
                    $caminhoImg = $pasta . $name . $extensao;
                    move_uploaded_file($img['tmp_name'], $caminhoImg);
                    
                    $pasta = '/assets/images/imagens_produtos/';
                    $caminhoImg = $pasta . $name . $extensao;
                }

                $newProduto = new ProdutoController();
                $erro = $newProduto->cadastrarProduto($produto, $marcaId, $medida, $unidadeMedida, $setorId, $caminhoImg);
                
                if (!empty($erro)) {
                    $msgHtml = '<div class="alert alert-danger" role="alert">' . $erro . '</div>';
                } else {
                    $msg = "Produto cadastrado com sucesso.";
                    $msgHtml = '<div class="alert alert-success" role="alert">' . $msg . '</div>';
                }
                $this->view('admin/cadastrarproduto', ['msgHtml' => $msgHtml]);
                
            } else {
            
            }
        }
    }

    public function gerenciarMarca()
    {
        $marcas = new MarcaController();
        $marcas = $marcas->getMarcas();
        $this->view('admin/gerenciarMarca', ['marcas' => $marcas]);
    }

    public function cadastrarMarca()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marcaNome = $_POST['marcaNome'];
            $marcaController = new MarcaController();
            $erro = $marcaController->cadastrarMarca($marcaNome);
            if (!empty($erro)) {
                $msgHtml = '<div class="alert alert-danger" role="alert">' . $erro . '</div>';
            } else {
                $msg = "Marca cadastrada com sucesso.";
                $msgHtml = '<div class="alert alert-success" role="alert">' . $msg . '</div>';
            }
            $this->view('admin/gerenciarMarca', ['msgHtml' => $msgHtml]);
        } else {
            $this->view('admin/cadastrarMarca');
        }
    }

}
