<?php
try {

    include ("../configurações/conexao.php");

    $query = $conexao->prepare("INSERT INTO compra_has_produto (compra_idcompras, produto_idproduto, preco) VALUES (:id_atendimento, :id_itens, :valor)" );
    $query->bindValue(':id_itens', $_POST['id_produto']);
    $query->bindValue(':id_atendimento', $_POST['id_atendimento']);
    $query->bindValue(':valor', $_POST['valor_produto']);
    $query->execute();

    $valor= $conexao->prepare("Select * from compra_has_produto where id=:id");
    $valor->bindValue(':id', $conexao->lastInsertId());
    $valor->execute();


    $verificaValor= $conexao->prepare("Select * from produto where id=:id");
    $verificaValor->bindValue(':id', $_POST['id_produto']);
    $verificaValor->execute();

    $linhaAntigo = $verificaValor->fetchObject();
    $valorAntigo = $linhaAntigo->valor_compra;

    $linha = $valor->fetchObject();
    $valorAtual = $linha->preco;

    if ($valorAntigo != $valorAtual){
        retornaErro('Produto sofreu alteração de preço, favor verificar');
    }else{
        retornaOK("O produto não sofreu alteração de preço");
    }


} catch (Exception $exception ) {
    //retornaErro( $exception->getMessage() );
    retornaErro("Ocorreu algum erro!");
}
