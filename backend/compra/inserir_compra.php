<?php

try {
    include "../configurações/segurança.php";
    include "../configurações/conexao.php";

    $query = $conexao->prepare("INSERT INTO compra (fornecedor_idfornecedor,nota,data)VALUES(:fornecedor,:nota, NOW()) ");
    $query->bindValue(':fornecedor',$_POST['fornecedor']);
    $query->bindValue(':nota',$_POST['nota']);
    $query->execute();

    if ($query->rowCount() == 1) {
        $retorno['id'] = $conexao->lastInsertId();
        $retorno['status'] = true;
        $retorno['mensagem'] = "Inserido com sucesso";
        echo json_encode($retorno);
        exit;
    } else {
        retornaErro('Erro ao inserir');
    }

} catch (Exception $exception) {
    retornaErro($exception->getMessage());
}
