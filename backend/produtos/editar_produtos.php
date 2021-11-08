<?php

try {

    include "../configurações/conexao.php";

    $query = $conexao->prepare("SELECT * FROM produto WHERE nome=:nome AND id<>:id");
    $query-> bindValue(':nome', $_POST['nome']);
    $query-> bindValue(':id'  , $_POST['id']);
    $query->execute();
    if ($query->rowCount()==1){
        retornaErro('Nome do produto já foi cadastrado.');
    }
    $query = $conexao->prepare("UPDATE produto SET nome=:nome,descricao=:descricao,valor=:valor,peso=:peso,quantidade=:quantidade,valor_compra=:valor_compra,margem=:margem, tipo_venda=:tipo_venda, link_foto=:link_foto WHERE id=:id");
    $query->bindParam(':id',$_POST['id']);
    $query->bindParam(':nome',$_POST['nome']);
    $query->bindParam(':descricao',$_POST['descricao']);
    $query->bindParam(':valor',$_POST['valor']);
    $query->bindParam(':peso',$_POST['peso']);
    $query->bindParam(':quantidade',$_POST['quantidade']);
    $query->bindParam(':valor_compra',$_POST['valor_compra']);
    $query->bindParam(':margem',$_POST['margem']);
    $query->bindParam(':tipo_venda',$_POST['tipo_venda']);
    $query->bindParam(':link_foto',$_POST['link_foto']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Alterado com sucesso. ');

    }else {
        retornaOK('Nenhum dado alterado. ');
    }

} catch (PDOException $exception) {
    retornaErro ( $exception->getMessage() );
}
