<?php
include_once ("../conexao.php");

try {

    include(__ROOT__ . '/documentacao.php');
    include(__ROOT__ . '/componentes/menu.php');

    $query = $conexao->prepare('Select atendimento_produto.quantidade as quantidade, produto.nome as produto, atendimento_produto.valorproduto as valor
                                   from produto, atendimento_produto where
                                   atendimento_produto.atendimento_idatendimento =:atendimento
                                   && produto.id = atendimento_produto.produto_idproduto;');
    $query->bindParam(":atendimento", $_COOKIE['carrinho']);
    $query->execute();

    $foto = asset('/fotos/logo_mini.png');

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>Natural Chá</title>
        <link rel="icon" href="<?php $foto ?>">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="<?php echo asset('../../../js/natural_cha_tcc/jquery.bootgrid.css'); ?>" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap"
              rel="stylesheet">
        <style>
            #search{
                float: right;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <br><br><br><br>

        <h1> Carrinho</h1>

        <form class="form-inline" id="search" action="" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="pesquisa" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
    </div>

    </body>
    </html>
    <?php
}catch (PDOException $exception){
    echo $exception;
}