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

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Produtos</title>

    </head>

    <body>
    <div class="container" id="corpo">

        <br>
        <br>
        <br>
    <h1> Produtos</h1>
        <div class="row">
            <div class="col-12">

                <?php
                 while ($linhaProduto=$produto->fetchObject()){
                    echo "<div class=\"card\" style=\"width: 18rem;\">
  <img src=\"...\" class=\"card-img-top\" alt=\"...\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">{$linhaProduto->nome}</h5>
    <p class=\"card-text\">$linhaProduto->nome</p>
    <a href=\"#\" class=\"btn btn-primary\">Go somewhere</a>
  </div>
</div>";
                }
                ?>



                </ul>
            </div>
        </div>
    </div>
    </div>




    </body>


    <?php

}catch (PDOException $exception){
    echo $exception->getMessage();
    echo '<br>';
    echo "Deu erro!";
}
