<?php

try{

    require  "../configurações/conexao.php";

    $pagina = $_POST['current'];
    $quantidade = $_POST['rowCount'];
    $inicio = ($pagina - 1) * $quantidade;

    $sql="SELECT vendas_itens.idvendaiten, produto.nomeproduto, vendas_itens.valor FROM vendas_itens INNER JOIN produtos ON vendas_itens.idproduto = produtos.id INNER JOIN produtos On produtos.nomeproduto = produtos.nomeproduto WHERE vendas_itens.idvenda ={$_POST['id']} ";

    if($_POST['searchPhrase'] != '')
    {
        $sql .= " AND (
                 produtos.nomeproduto LIKE '%{$_POST['searchPhrase']}%' 
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
