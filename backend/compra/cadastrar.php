<?php

try {

    include "../conexao.php";

    $atendente=$_POST['atendente'];
    $cliente=$_POST['cliente'];

    $cadastrando= $conexao->prepare("Insert into atendimentos (id_atendente, id_cliente, data_atendimento) VALUES (:atendente, :cliente, NOW())");
    $cadastrando->bindValue(":atendente", $atendente);
    $cadastrando->bindValue(":cliente", $cliente);
    $cadastrando->execute();

    if ($cadastrando->rowCount() == 1) {
        $retorno['status'] = true;
        $retorno['mensagem'] = 'Inserido com sucesso';
        $retorno['id'] = $conexao->lastInsertId();

        echo json_encode($retorno);

    } else {
        retornaErro("Erro ao inserir");
    }

} catch (PDOException $exception) {
        retornaErro($exception->getMessage());
}

