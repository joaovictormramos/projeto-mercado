<?php
$this->layout('master', ['title' => 'Cadastrar estabelecimento']);
?>

<h1>Estabelecimentos</h1>
<h4>Página de cadastrar estabelecimento</h4>

<table>
<?php
foreach($estabelecimentos as $estabelecimento) {
    echo    '<tr>
                <td><h4>' .  $estabelecimento->estabelecimento_nome . '</h4></td>
                <td><button> Editar estoque</button></td>
                <td><button> Editar registro</button></td>
            </tr>';
}
?>
</table>

<button>Cadastrar novo estabelecimento</button>

<a href="/admin">Voltar</a>
