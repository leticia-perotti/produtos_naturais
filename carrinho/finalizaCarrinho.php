<?php

try {
    include_once("../conexao.php");
    include(__ROOT__ . '/documentacao.php');

    $confereCarrinho = $conexao->prepare('Select * from atendimento where idatendimento=:atendimento');
    $confereCarrinho->bindParam(":atendimento", $_COOKIE['carrinho']);
    $confereCarrinho->execute();

    $linha= $confereCarrinho->fetch();

    if ($linha-> cliente_idclientes == null){
        header("Location:".asset('/login/login.php'));
        exit();
    }


    /*if ($inserir->rowCount() == 1) {
        retornaOK("Valor inserido com sucesso");
    } else {
        retornaErro("Nenhum dado alterado");
    }*/
}catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}
