<?php


include_once("../conexao.php");


$idProduto = $_POST['id'];
$quantidade = $_POST['qnt'];
$valor = $_POST['valor'];

$valor = number_format($valor, 2, '.', '');

if (isset($_COOKIE['carrinho']) && $_COOKIE['carrinho']!=''){
    $codigoDoCarrinho = $_COOKIE['carrinho'];
}else{
    $criaCarrinho = $conexao->prepare('Insert into atendimento (data_carrinho) 
                                  values 
                                  (NOW()) ');
    $criaCarrinho->execute();

    $codigoDoCarrinho = $conexao->lastInsertId();

    setcookie('carrinho', $codigoDoCarrinho, time()+60*60*24*30, "/");

}
$adicionar = $conexao->prepare('Insert into atendimento_produto (quantidade, atendimento_idatendimento, produto_idproduto, valorproduto) 
                                  values 
                                  (:qnt, :carinho,:produto, :valor)');
$adicionar->bindParam(":qnt", $quantidade);
$adicionar->bindParam(":produto", $idProduto);
$adicionar->bindParam(":carinho", $codigoDoCarrinho);
$adicionar->bindValue(":valor", $valor);
$adicionar->execute();

$ultimo =$conexao->lastInsertId();

$somaIguais = $conexao ->prepare('Select * from atendimento_produto where produto_idproduto=:produto && atendimento_idatendimento=:atendimento');
$somaIguais->bindParam(":produto", $idProduto);
$somaIguais->bindParam(":atendimento", $codigoDoCarrinho);
$somaIguais->execute();

$qnt =0;

if($somaIguais->rowCount()>1) {
    while ($linha = $somaIguais->fetch()){
        $qnt = $qnt + $linha->quantidade;
    }
    $adicionaSoma = $conexao->prepare("Update atendimento_produto set quantidade=:qnt where
                                                    (atendimento_idatendimento=:atendimento && produto_idproduto=:produto) 
                                                    && idatendimento_produto=:id");
    $adicionaSoma->bindParam(":qnt", $qnt);
    $adicionaSoma->bindParam(":produto", $idProduto);
    $adicionaSoma->bindParam(":atendimento", $codigoDoCarrinho);
    $adicionaSoma->bindParam(":id", $ultimo);
    $adicionaSoma->execute();


    $deletaResto=$conexao->prepare("Delete from atendimento_produto where
                                                 atendimento_idatendimento=:atendimento && produto_idproduto=:produto 
                                                 && idatendimento_produto!=:id");
    $deletaResto->bindParam(":produto", $idProduto);
    $deletaResto->bindParam(":atendimento", $codigoDoCarrinho);
    $deletaResto->bindParam(":id", $ultimo);
    $deletaResto->execute();

}

if($adicionar->rowCount()==1){
    retornaOK("Valor inserido com sucesso");
}else{
    retornaErro("Erro ao inserir");
}