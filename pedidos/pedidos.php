<?php

include_once ("../conexao.php");

try{

include(__ROOT__ . '/documentacao.php');
include(__ROOT__ . '/componentes/menu.php');

    $queryAtendimento = $conexao->prepare('Select DATE_FORMAT(atendimento.data_carrinho, "%d/%m/%Y") as data_formatada, status, idatendimento as id
                                       from atendimento
                                       where cliente_idclientes=:cliente and ( status = 2 || status = 3)
                                       order by data_formatada');
    $queryAtendimento-> bindParam(":cliente", $_SESSION['cliente_id']);
    $queryAtendimento->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Natural Chá | Pedidos</title>
    <style>
        #imagem{
            width: 75px;

        }
        #texto{
            color: black;
            display: inline-block;
            font-size: x-large;
        }
        #qnt{
            color: #434546;
            display: inline-block;
            font-size: small;
        }
        #produto{
            padding: 10px;
            border-width: thin;
            border-style: solid;
            border-color: #adb5bd;
            border-radius: 10px;
            margin-top: 5px;
        }
    </style>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

</head>


<body>
<div class="container">
    <h1>Pedidos</h1>
    <hr>
    <div id="accordion">
        <?php
        if($queryAtendimento->rowCount()==0):
            ?>
            <div class='alert alert-warning' role='alert'>
                Este usuário ainda não apresenta um pedido!
            </div>
        <?php
        else:
            while ($linha= $queryAtendimento->fetch()):
                $queryProduto=$conexao->prepare("Select
                                                        atendimento_produto.valorproduto as valor,
                                                        produto.nome As produto,
                                                        produto.id as id,
                                                        atendimento_produto.quantidade,
                                                        produto_foto.nome_foto as foto
                                                    From
                                                        atendimento_produto Inner Join
                                                        produto On atendimento_produto.produto_idproduto = produto.id Left Join
                                                        produto_foto On produto_foto.produto_id = produto.id
                                                    Where
                                                        atendimento_produto.atendimento_idatendimento = :atendimento");
                $queryProduto->bindParam("atendimento", $linha->id);
                $queryProduto->execute();

                    ?>
        <div class="card">
            <div class="card-header" id="<?php echo $linha->id?>">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#<?php echo $linha->id?>" aria-expanded="true" aria-controls="<?php echo $linha->id?>">
                        <h3><?php echo $linha->data_formatada; ?></h3>

                    </button>

                        <?php
                        if($linha->status == 2):

                            ?>

                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    Pedido pendente
                                </div>
                            </div>
                        <?php endIf;
                        if($linha->status == 3):
                            ?>

                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                    Pedido retirado
                                </div>
                            </div>
                        <?php
                        endIf;
                        ?>
                                        </h5>
            </div>


            <div id="<?php echo $linha->id?>" class="collapse show" aria-labelledby="<?php echo $linha->id?>" data-parent="#<?php echo $linha->id?>">
                <div class="card-body">
                    <?php while($linhaProduto = $queryProduto->fetchObject()):
                        ?>
                    <div id="produto">
                        <img src="<?php echo imagem($linhaProduto->foto); ?>" id="imagem">
                        <div id="texto"> <?php echo $linhaProduto->produto; ?> </div>
                        <div id="qnt"> Quantidade: <?php echo $linhaProduto->quantidade; ?> </div><br>
                        <div id="qnt"> Valor da unidade <?php echo formatar_valor($linhaProduto->valor); ?> </div>
                    </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
<?php

    endwhile;
        endIf;
    ?>



</div>
</div>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Voltar ao topo</a>
            </p>
            <p>Natural Chá 2021</p>

        </div>
    </footer>
</body>

    <?php
}catch (PDOException $exception){
    echo $exception->getMessage();
    echo "Deu erro";

}