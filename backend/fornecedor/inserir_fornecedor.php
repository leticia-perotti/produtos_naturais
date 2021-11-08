<?php

try {

    include "../configurações/conexao.php";

    $query = $conexao->prepare("SELECT * FROM fornecedor WHERE cnpj=:cnpj");
    $query->bindValue(':cnpj',$_POST['cnpj']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaErro('Fornecedor já existente');
    }


    $query = $conexao->prepare("INSERT INTO fornecedor (nome,cnpj,endereco,transportadora) VALUES(:nome,:cnpj,:endereco,:transportadora)");
    $query->bindValue(':nome',$_POST['nome']);
    $query->bindValue(':cnpj',$_POST['cnpj']);
    $query->bindValue(':endereco',$_POST['endereco']);
    $query->bindValue(':transportadora',$_POST['transportadora']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Inserido com sucesso ');

    } else {
        retornaErro('Erro ao inserir');
    }

} catch (Exception $exception) {
    retornaErro($exception->getMessage());
}
