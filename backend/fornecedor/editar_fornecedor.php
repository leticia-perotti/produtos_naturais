<?php

try {

    include "../configurações/conexao.php";

    $query = $conexao->prepare("SELECT * FROM fornecedor WHERE nome=:nome AND id<>:id");
    $query-> bindValue(':nome', $_POST['nome']);
    $query-> bindValue(':id'  , $_POST['id']);
    $query->execute();
    if ($query->rowCount()==1){
        retornaErro('Nome do produto já foi cadastrado.');
    }
    $query = $conexao->prepare("UPDATE fornecedor SET nome=:nome,cnpj=:cnpj,endereco=:endereco,transportadora=:transportadora WHERE id=:id");
    $query->bindParam(':id',$_POST['id']);
    $query->bindParam(':nome',$_POST['nome']);
    $query->bindParam(':cnpj',$_POST['cnpj']);
    $query->bindParam(':endereco',$_POST['endereco']);
    $query->bindParam(':transportadora',$_POST['transportadora']);

    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Alterado com sucesso. ');

    }else {
        retornaOK('Nenhum dado alterado. ');
    }

} catch (PDOException $exception) {
    retornaErro ( $exception->getMessage() );
}
