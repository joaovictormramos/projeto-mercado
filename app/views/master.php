<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <link rel="shortcut icon" type="imagex/icon" href="/assets/images/app-images/icon.ico">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body class="text-center">
    <header class="cabecalho">
        <?=$this->fetch('partials/header')?>
    </header>

    <?=$this->section('content')?>
    
    <footer class="rodape">
        <?=$this->fetch('partials/footer')?>
    </footer>

    <script src="/assets/js/incrementDecrement.js"></script>

</body>
</html>