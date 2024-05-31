<?php $this->layout('master', ['title' => 'Criar conta - SupportMercado'])?>

<h1>Cadastrar usuário</h1>

<form action="/auth/cadastrar" method="post">
    <label for="nomeCompleto">Nome</label>
    <abbr title="Nome completo">
        <input type="text" name="nomeCompleto" required>
    </abbr>
    
    <label for="cpf">CPF</label>
    <input type="number" name="cpf" required>

    <label for="email">Email</label>
    <input type="text" name="email" required>

    <label for="senha">Senha</label>
    <input type="password" name="senha" required>
    
    <label for="confirmaSenha">Confirmar senha</label>
    <input type="password" name="confirmaSenha">

    <button>Cadastrar</button>
</form>

<a href="/">Retornar</a>
