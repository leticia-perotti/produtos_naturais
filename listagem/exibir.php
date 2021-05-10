<?php

try{
    include "../conexao.php";
    include "../documentacoes.php";
    include "../menu_nav.php";
    include "../seguranca.php";


    if(!isset($_GET["id"])){
        die ("Acesse atravez da listagem");
    }

    $exibir= $conexao->prepare("SELECT * FROM produtos where id_produto=:id");
    $exibir-> bindValue(':id', $_GET['id']);
    $exibir-> execute();

    if($exibir->rowCount()==0){
        exit ("Objeto não encontrado");
    }

    $linha= $exibir->fetchObject();

}catch (PDOException $exception){
    echo $exception->getMessage();
    echo "Deu erro!";
}
?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Exibir</title>

        <link rel="stylesheet" href="estilo.css">



    </head>


    <body>





    <div class="container">
        <h1> Exibir </h1>
        <div class="card">
            <div class="card-header">
                Dados do produto <b><?php echo $_GET['id'] ?></b>
            </div>
            <div class="card-body">
                <div class="form group row">
                    <label for="id_cliente" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <?php echo $linha->nome_produto?>                </div>
                </div>

                <div class="form group row">
                    <label for="data" class="col-sm-2 col-form-label">Valor</label>
                    <div class="col-sm-10">
                        <?php echo $linha->valor_produto;?>
                    </div>
                </div>

                <div class="form group row">
                    <label for="data" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <?php echo $linha->descricao_produto;?>
                    </div>
                </div>
                <div class="form group row">
                    <label for="data" class="col-sm-2 col-form-label">Imagem</label>
                    <div class="col-sm-10">
                        <?php
                        if ($linha->foto_produto && is_file(DIRETORIO_IMAGEM . $linha->foto_produto)):
                            ?>

                            <img src="<?php echo URL . $linha->foto_produto; ?>" id="imagem">
                        <?php
                        endif;

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="float-right botao">
            <a href="listagem.php" class="btn btn-outline-success">Ir para a listagem</a>
        </div>
    </div>





    </body>
    </html>
<?php
echo "</div>";


