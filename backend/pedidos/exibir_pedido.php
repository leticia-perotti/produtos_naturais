<?php

include("../configurações/segurança.php");

try{
    include ("../configurações/conexao.php");
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $queryAtendimento = $conexao->prepare('Select DATE_FORMAT(atendimento.data_carrinho, "%d/%m/%Y") as data_formatada, status, idatendimento as id, cliente.nome as cliente
                                       from atendimento inner join cliente on atendimento.cliente_idclientes = cliente.id
                                       where idatendimento =:atendimento and ( status = 2 || status = 3)
                                       ');
    $queryAtendimento-> bindParam(":atendimento", $_GET['id']);
    $queryAtendimento->execute();


    if($queryAtendimento->rowCount()==0){
        exit("Pedido nao encontrado ");
    }
    //$linha = $query->fetchObject();

}catch(PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exibir Pedido</title>
    <style>
        #imagem{
            width: 75px;

        }

        #produto{
            padding: 10px;
            border-width: thin;
            border-style: solid;
            border-color: #adb5bd;
            border-radius: 10px;
            margin-top: 5px;
        }
        #imagem{
            min-width: 10%;
        }
        #dados{
            text-align: justify;
            min-width: 30%;
        }
        #titulo{
            text-align: justify;
            min-width: 30%
        }
        .linha{
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <h2>Exibir pedido</h2>
    <br>
    <?php
    while ($linha= $queryAtendimento->fetch()):
        $queryDados= $conexao->prepare("Select 
                                                  *, DATE_FORMAT(dia_retirada, '%d/%m/%Y') as data, DATE_FORMAT(hora_retirada, '%d/%m/%Y %H:%i:%s') as retirada                                 
                                                  from
                                                  controla_retirada
                                                  where
                                                  atendimento_id=:id
                                                  ");
        $queryDados->bindValue(":id", $_GET['id']);
        $queryDados->execute();
        $linhaDados = $queryDados->fetchObject();


        ?>
        <div class="card">
            <div class="card-header" id="<?php echo $linha->id?>">
                <h5 class="mb-0">
                    <h3>Data: <?php echo $linha->data_formatada; ?></h3>
                    <h3>Cliente: <?php echo $linha->cliente; ?></h3>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                </svg>
                                Pedido retirado<br>
                                Data e horário de retirada: <?php echo $linhaDados->retirada;?>
                            </div>
                        </div>
                    <?php
                    endIf;
                    ?>
                </h5>
                <div class="alert alert-secondary" role="alert">
                    <h4>Dados gerais do pedido</h4>
                    <div id="dados" class="linha">
                        <span>Hora previta :<?php echo $linhaDados->hora_prevista; ?></span><br>
                        <span>Dia previto :<?php echo $linhaDados->data; ?></span><br>
                        <span>Quem retirará :<?php echo $linhaDados->quem_retira; ?></span><br>
                        <span>Forma de pagamento :<?php echo $linhaDados->meio_pagamento; ?></span><br>
                        <span>Observação :<?php echo $linhaDados->observacao; ?></span><br>
                    </div>
                </div>

                <?php
                $queryCarrinho= $conexao->prepare('Select (atendimento_produto.valorproduto * atendimento_produto.quantidade) as valorTotalProduto
                                             from atendimento_produto where atendimento_produto.atendimento_idatendimento =:atendimento');
                $queryCarrinho->bindParam(":atendimento", $_GET['id']);
                $queryCarrinho->execute();

                $valorCarrinho = 0;

                while ($linhaCarrinho = $queryCarrinho->fetch()){
                    $valorCarrinho = $valorCarrinho + $linhaCarrinho->valorTotalProduto;
                }
                $valor=formatar_valor($valorCarrinho);
                ?>
                <div class="alert alert-primary" role="alert">
                    Valor estimado de R$ <span id="valorTotal"><?php echo $valor;?></span>
                </div>
            </div>
               <div class="card-body" class="linha">
                    <?php
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
                    $queryProduto->bindParam(":atendimento", $_GET['id']);
                    $queryProduto->execute();

                    while($linhaProduto = $queryProduto->fetchObject()):
                        ?>
                        <div id="produto">
                            <img src="<?php echo imagem($linhaProduto->foto); ?>" id="imagem">
                            <div id="titulo" class="linha"> <?php echo $linhaProduto->produto; ?> </div>
                            <div id="dados" class="linha"> Quantidade: <?php echo $linhaProduto->quantidade; ?> <br>
                                Valor da unidade: R$ <?php echo formatar_valor($linhaProduto->valor); ?> </div>
                        </div>
                        <br>
                    <?php
                    endwhile;
                    ?>
                </div>

        </div>
    <?php

    endwhile;

    ?>
</div>





</body>
</html>
