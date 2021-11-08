<?php

try {
    require ("../configurações/conexao.php");

    $pagina = $_POST['current'];
    $quantidade = $_POST['rowCount'];
    $inicio = ($pagina - 1 ) * $quantidade;

    $sql = " Select
    compra_has_produto.preco as valor, 
    produto.nome as nome,
    compra_has_produto.id as id
From
    compra_has_produto inner join produto
    on produto.id = compra_has_produto.produto_idproduto  
 
Where
    compra_idcompras = {$_POST['id']}  ";

    if ($_POST['searchPhrase']!=''){
        $sql .= " and (
                        produtos.nome_produto LIKE '%{$_POST['searchPhrase']}%' or
                        produtos.descricao_produto LIKE '%{$_POST['searchPhrase']}%'
                        ) ";
    }

    $resultados = $conexao->prepare($sql);
    $resultados->execute();
    $total = $resultados->rowCount();
    //FIM - Contagem quantidade de registros

    $sql .= " order by ";
    foreach ($_POST['sort'] as $campo => $tipo_order) {
        $sql .= $campo . " "  . $tipo_order;
    }

    if ($quantidade<>-1){
        $sql .=  " LIMIT {$inicio} , {$quantidade} ";
    }

    $resultados=$conexao->prepare($sql);
    $resultados->execute();

    $ret['current'] = $pagina;
    $ret['rowCount'] = $resultados->rowCount();
    $ret['total'] = $total;
    $ret['rows'] = $resultados->fetchAll();

    echo json_encode($ret);

}catch (PDOException $exception) {
    echo $exception->getMessage();
}