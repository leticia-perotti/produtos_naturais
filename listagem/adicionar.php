<?php


include_once("../conexao.php");


$idProduto = $_POST['id'];
$quantidade = $_POST['qnt'];

if (isset($_COOKIE['carrinho']) && $_COOKIE['carrinho']!=''){
    $codigoDoCarrinho = $_COOKIE['carrinho'];
}else{
    $criaCarrinho = $conexao->prepare('Insert into atendimento (data_carrinho) 
                                  values 
                                  (NOW()) ');
    $criaCarrinho->execute();

    $codigoDoCarrinho = $conexao->lastInsertId();

    setcookie('carrinho', $codigoDoCarrinho, time()+60*60*24*30);
}
$adicionar = $conexao->prepare('Insert into atendimento_produto (quantidade, atendimento_idatendimento, produto_idproduto) 
                                  values 
                                  (:qnt, :carinho,:produto)');
$adicionar->bindParam(":qnt", $quantidade);
$adicionar->bindParam(":produto", $idProduto);
$adicionar->bindParam(":carinho", $codigoDoCarrinho);
$adicionar->execute();

if($adicionar->rowCount()==1){
    retornaOK("Valor inserido com sucesso");
}else{
    retornaErro("Erro ao inserir");
}
