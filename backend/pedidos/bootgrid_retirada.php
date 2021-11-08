<?php

try{

    require  "../configurações/conexao.php";

    $pagina = $_POST['current'];
    $quantidade = $_POST['rowCount'];
    $inicio = ($pagina - 1) * $quantidade;

    $sql="Select
    atendimento.data_carrinho,
    atendimento.cliente_idclientes,
    atendimento.idatendimento AS id,
    cliente.nome
From
    atendimento Inner Join
    cliente On atendimento.cliente_idclientes = cliente.id
WHERE status= 3";

    if($_POST['searchPhrase'] != '')
    {
        $sql .= " AND (
                 atendimento.cliente_idclientesLIKE '%{$_POST['searchPhrase']}%' 
                 ) ";
    }

    $resultados=$conexao->prepare($sql);
    $resultados->execute();
    $total = $resultados->rowCount();

    $sql .= " ORDER BY ";
    foreach ($_POST['sort'] as $campo => $tipo_order){
        $sql .= $campo . " " . $tipo_order;
    }

    if($quantidade<>-1){
        $sql .= " LIMIT {$inicio} , {$quantidade}";
    }

    $resultados=$conexao->prepare($sql);
    $resultados->execute();

    $ret['current'] = $pagina;
    $ret['rowCount'] = $resultados->rowCount();
    $ret['total'] = $total;
    $ret['rows'] = $resultados->fetchAll();

    echo json_encode($ret);

}catch(PDOException $exception){
    echo $exception->getMessage();
}
