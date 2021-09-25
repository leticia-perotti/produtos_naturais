<?php

try {
    include_once("../conexao.php");
    include(__ROOT__ . '/documentacao.php');
    include(__ROOT__ . '/componentes/menu.php');

    $confereCarrinho = $conexao->prepare('Select * from atendimento where idatendimento=:atendimento');
    $confereCarrinho->bindParam(":atendimento", $_COOKIE['carrinho']);
    $confereCarrinho->execute();

    $linha= $confereCarrinho->fetch();

    if ($linha-> cliente_idclientes == null){
        header("Location:".asset('/login/login.php'));
        exit();
    }

    $foto =asset('/fotos/logo_mini.png');
?>
    <!doctype html>
    <html lang="en">
<head>
    <title>Natural Chá</title>
    <link rel="icon" href="<?php $foto?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
    <body>
    <div class="container">
        <br><br><br>

        <h1> Finalizar compra</h1>

        <form method="post" type="jsonForm">
            <div class="form-group">
                <label for="exampleInputPassword1">Nome de quem retirá</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hora prevista para a retirada</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Forma de pagamento</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="button" class="btn btn-success">Finalizar compra</button>
        </form>

    </div>
    </body>
    <?php
}catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}
