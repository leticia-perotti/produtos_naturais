<?php
try{
include "../documentacao.php";
include "../menu.php";
include "../conexao.php";


try {
$produto= $conexao-> query("Select *from produto");

}catch (PDOException $exception ) {
echo $exception->getMessage();
}


?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Natural Chá | Exibir produto</title>
        <link rel="shortcut icon" href="../fotos/logo_mini.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">

        <style>
            .titulo{
                font-family: 'Comfortaa', cursive;
                font-family: 'Pattaya', sans-serif;
                font-size: xx-large;
                color: black;
            }


        </style>

    </head>


    <body>
    <br>
    <br>
    <br>

    <div class="container">
        <h1 class="titulo">Camomila</h1>
        <img src="../fotos/camomila.jpg">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" value="R$ 3.00">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" value="Pacote com 50g">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Quantidade </label>
            <div class="col-sm-10">
                <input type="text" id="exampleFormControlInput1" class="form-control-plaintext">
            </div>
        </div>
    </div>

    </body>
    </html>

    <?php

}catch (PDOException $exception) {
    echo $exception->getMessage();
    echo '<br>';
    echo "Deu erro!";

}
