<?php


include_once("../conexao.php");
include(__ROOT__ . '/documentacao.php');


$idProduto = $_POST['id'];
$quantidade = $_POST['qnt'];


$adicionar = $conexao->prepare('Insert into atendimento_produto (quantidade, atendimento_idatendimento, produto_idproduto, valorproduto) 
                                  values 
                                  (:qnt, 1,:produto, 1)');
$adicionar->bindParam(":qnt", $quantidade);
$adicionar->bindParam(":produto", $idProduto);
$adicionar->execute();


if ($adicionar->rowCount() == 1) {
    echo "deu";
}
