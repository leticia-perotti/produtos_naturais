<?php
try {

    require '../configurações/conexao.php';

    $pagina = $_POST ['current'];
    $quantidade = $_POST ['rowCount'];
    $inicio = ($pagina - 1) * $quantidade;

    $sql = "SELECT * FROM produto WHERE 1 ";

    if($_POST['searchPhrase'] != '')
    {
        $sql .= " AND (
                 id LIKE '%{$_POST['searchPhrase']}%'
                 OR nome LIKE '%{$_POST['searchPhrase']}%'
                 OR descricao LIKE '%{$_POST['searchPhrase']}%'
                 OR valor LIKE '%{$_POST['searchPhrase']}%'
                 OR peso LIKE '%{$_POST['searchPhrase']}%'
                 OR quantidade LIKE '%{$_POST['searchPhrase']}%'
                 OR valor_compra LIKE '%{$_POST['searchPhrase']}%'
                 OR margem LIKE '%{$_POST['searchPhrase']}%'
                 ) ";
    }

    $resultados=$conexao->prepare($sql);
    $resultados->execute();
    $total = $resultados->rowCount();


    $sql .= " ORDER BY ";

    foreach ($_POST['sort'] as $campo => $tipo_order) {
        $sql .= $campo . " " . $tipo_order;
    }

    if ($quantidade <> -1) {
        $sql .= " LIMIT {$inicio}, {$quantidade} ";
    }
    $resultados = $conexao->prepare($sql);
    $resultados->execute();

    $ret['current'] = $pagina;
    $ret['rowCount'] = $resultados->rowCount();
    $ret['total'] = $total;
    $ret['rows'] = $resultados->fetchAll();

    echo json_encode($ret);
}catch (PDOException $exception){
    echo ($exception->getMessage());
}

