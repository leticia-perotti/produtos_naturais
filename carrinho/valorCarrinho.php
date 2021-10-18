<?php
try{
    include "../conexao.php";

//    $queryCarrinho= $conexao->prepare('Select atendimento_produto.valorproduto as valor, atendimento_produto.quantidade as quantidade
//                                             from atendimento_produto where atendimento_produto.atendimento_idatendimento =:atendimento');
    $queryCarrinho= $conexao->prepare('Select (atendimento_produto.valorproduto * atendimento_produto.quantidade) as valorTotalProduto
                                             from atendimento_produto where atendimento_produto.atendimento_idatendimento =:atendimento');
    $queryCarrinho->bindParam(":atendimento", $_COOKIE['carrinho']);
    $queryCarrinho->execute();

    $valorCarrinho = 0;

    while ($linhaCarrinho = $queryCarrinho->fetch()){
        $valorCarrinho = $valorCarrinho + $linhaCarrinho->valorTotalProduto;
    }

    $ret['valor_total'] = $valorCarrinho;

    echo json_encode($ret);

}catch (PDOException $exception){
    echo $exception->getMessage();
}
