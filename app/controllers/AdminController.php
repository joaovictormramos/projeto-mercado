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

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] == true) {
            $nome = $_SESSION['nome'];
            $idAdmin = $_SESSION['id'];
            $isAdmin = $_SESSION['isAdmin'];
            $this->view('admin/painelAdmin', ['idAdmin' => $idAdmin]);
        } else {
            $this->redirect('/');
        }
    }

    //Usa o método exibirEstabelecimentos de EstabelecimentoController para enviar à view gerenciarEstabelecimento todos os estabelecimentos.
    public function gerenciarEstabelecimento()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] == true) {
            $estabelecimentoController = new EstabelecimentoController();
            $estabelecimentos = $estabelecimentoController->exibirEstabelecimento();
            $this->view('admin/gerenciarEstabelecimento', ['estabelecimentos' => $estabelecimentos]);
        } else {
            $this->redirect('/');
        }
    }

    public function cadastrarEstabelecimento()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $this->view('admin/cadastrarEstabelecimento');
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST)) {
                    $estabelecimentoNome = $_POST['estabelecimento'];
                    $estabelecimentoEndereco = $_POST['endereco'];
                    $estabelecimentoController = new EstabelecimentoController();
                    $erro = $estabelecimentoController->cadastrarEstabelecimento($estabelecimentoNome, $estabelecimentoEndereco);

                    if (!empty($erro)) {
                        $msgHtml = '<div class="alert alert-danger" role="alert">' . $erro . '</div>';
                    } else {
                        $msg = "Estabelecimento cadastrada com sucesso.";
                        $msgHtml = '<div class="alert alert-success" role="alert">' . $msg . '</div>';
                    }
                    $this->view('admin/cadastrarEstabelecimento', ['msgHtml' => $msgHtml]);
                }
            }
        } else {
            $this->redirect('/');
        }
    }

    //Usa o método exibirProdutos de EstabelecimentoController para enviar à view editarestoque os produtos do estabelecimento utilizando o id.
    public function editarEstoque()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {

            $idEstabelecimento = $_POST['idEstabelecimento'];
            $nomeEstabelecimento = $_POST['estabelecimento'];
            $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
            $estabelecimentoProdutos = $estabelecimentoProdutoController->exibirProdutos($idEstabelecimento);

            $setores = new SetorController();
            $setores = $setores->getSetor();

            $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
            $produtosACadastrar = $estabelecimentoProdutoController->produtosNaoCadastrados($idEstabelecimento);

            $this->view('/admin/editarEstoque', ['estabelecimentoProdutos' => $estabelecimentoProdutos, 'produtosACadastrar' => $produtosACadastrar, 'estabelecimentoId' => $idEstabelecimento, 'nomeEstabelecimento' => $nomeEstabelecimento, 'setores' => $setores]);
        } else {
            $this->redirect('/');
        }
    }

    public function gerenciarProduto()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {
            $setores = new SetorController();
            $setores = $setores->getSetor();
            $this->view('admin/gerenciarProduto', ['setores' => $setores]);
        } else {
            $this->redirect('/');
        }
    }

    public function editarSetor()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {
            $setorId = $_POST['setorId'];
            $setorNome = $_POST['setorNome'];
            $produtoController = new ProdutoController();
            $produtosPorSetor = $produtoController->listarProdutos();
            $this->view('/admin/editarSetor', ['setorId' => $setorId, 'setorNome' => $setorNome, 'produtosPorSetor' => $produtosPorSetor]);
        } else {
            $this->redirect('/');
        }
    }

    public function cadastrarProduto()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $setorNome = $_GET['setorNome'];
                $setorId = $_GET['setorId'];
                $marcasController = new MarcaController();
                $marcas = $marcasController->getMarcas();
                $this->view('admin/cadastrarproduto', ['marcas' => $marcas, 'setorNome' => $setorNome, 'setorId' => $setorId]);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST)) {
                    $valores = explode('|', $_POST['marcaIdNome']);
                    $produto = $_POST['produto'];
                    $marcaId = $valores[0];
                    $marcaNome = lcfirst(ucwords(str_replace(' ', '', $valores[1]), ' '));
                    $medida = $_POST['medida'];
                    $unidadeMedida = ucfirst($_POST['unidadeMedida']);
                    $setorId = $_POST['setorId'];
                    $setorNome = strtolower($_POST['setorNome']);
                    if (isset($_FILES['imgproduto'])) {
                        $img = $_FILES['imgproduto'];
                        $name = str_replace(' ', '', lcfirst(ucwords($_POST['produto'], ' ')));
                        $extensao = '.' . strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
                        $pasta = '/opt/lampp/htdocs/public/assets/images/imagens_produtos/' . $marcaNome . '/' . $setorNome . '/';

                        if (!is_dir($pasta)) {
                            mkdir($pasta, 0777, true);
                        }

                        $caminhoImg = $pasta . $name . $marcaNome . $medida . $unidadeMedida . $extensao;
                        move_uploaded_file($img['tmp_name'], $caminhoImg);

                        $pasta = '/assets/images/imagens_produtos/' . $marcaNome . '/' . $setorNome . '/';
                        $caminhoImg = $pasta . $name . $marcaNome . $medida . $unidadeMedida . $extensao;
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
        } else {
            $this->redirect('/');
        }
    }

    public function gerenciarMarca()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {
            $marcas = new MarcaController();
            $marcas = $marcas->getMarcas();
            $this->view('admin/gerenciarMarca', ['marcas' => $marcas]);
        }
    }

    public function cadastrarMarca()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $marcaNome = $_POST['marcaNome'];
                $marcaController = new MarcaController();

                if (isset($_FILES)) {
                    $img = $_FILES['imgMarca'];
                    $name = strtolower($marcaNome);
                    $extensao = strtolower('.' . pathinfo($img['name'], PATHINFO_EXTENSION));
                    $pasta = '/opt/lampp/htdocs/public/assets/images/imagens_produtos/' . $name . '/logo/';

                    if (!is_dir($pasta)) {
                        mkdir($pasta, 0777, true);
                    }

                    $caminhoImg = $pasta . $name . 'Logo' . $extensao;
                    move_uploaded_file($img['tmp_name'], $caminhoImg);

                    $pasta = '/assets/images/imagens_produtos/' . $name . '/logo/' . $name . 'Logo' . $extensao;
                    $erro = $marcaController->cadastrarMarca($marcaNome, $pasta);
                }

                if (!empty($erro)) {
                    $msgHtml = '<div class="alert alert-danger" role="alert">' . $erro . '</div>';
                } else {
                    $msg = "Marca cadastrada com sucesso.";
                    $msgHtml = '<div class="alert alert-success" role="alert">' . $msg . '</div>';
                }
                $this->view('/admin/gerenciarMarca', ['msgHtml' => $msgHtml]);
            } else {
                $this->view('/admin/cadastrarMarca');
            }
        } else {

            $this->redirect('/');
        }
    }

    public function cad()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['isAdmin'] === true) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Exemplo de como acessar os preços e IDs dos produtos selecionados
                $precos = $_POST['preco'];
                $produtosSelecionados = $_POST['produtos'];
                $estabelecimentoId = $_POST['estabelecimentoId'];

                foreach ($produtosSelecionados as $produtoId) {
                    if (isset($precos[$produtoId])) {
                        $preco = (float) str_replace(',', '.', $precos[$produtoId]);
                        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
                        $erro = $estabelecimentoProdutoController->cadastrarProdutoEstabelecimento($preco, $produtoId, $estabelecimentoId);
                        $this->redirect('/admin/gerenciarestabelecimento');
                    }
                }
            } else {
                $this->redirect('/');

            }
        }
    }

    public function editarProduto()
    {
        $product = new ProdutoController();
        $getProduct = $product;
    }
}
