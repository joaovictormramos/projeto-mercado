<?php
$this->layout('master', ['title' => 'Criar lista']);
?>

<div class="container">
    <form action="" method="post">
        <br>
        <div class="row">
            <div class="col">
                <label for="listName">Nome da lista</label>
                <input type="text" name="listName" placeholder="Nome da lista">
            </div>
            <div class="col">
                <label for="appointmentDay">Agendar</label>
                <input type="date" name="appointmentDay" id="">
            </div>
            <div class="col">
                <button class="btn btn-success">Criar lista</button>
            </div>
        </div>
    </form>
</div>