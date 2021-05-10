<?php

try{
    include "../conexao.php";

    $pagina= $_POST['current'];
    $quantidade= $_POST['rowCount'];
    $inicio = ($pagina-1) *$quantidade;

    $sql="Select idproduto as id, nome, valor, descricao from produtos where 1";



    if($_POST['searchPhrase']!=''){
        $sql.= " and (
                   idproduto  LIKE'%{$_POST['searchPhrase']}%' or
                   valor  LIKE '%{$_POST['searchPhrase']}%' or
                   nome LIKE '%{$_POST['searchPhrase']}%' or
                   descricao  LIKE '%{$_POST['searchPhrase']}%' 
                   
                    
                   )";


    }
    $resultados = $conexao->prepare($sql);
    $resultados->execute();
    $total=$resultados->rowCount();

    $sql.= " order by ";
    foreach ($_POST['sort'] as $campo=>$tipo_order) {
        $sql .= $campo. " ". $tipo_order;
    }

    if ($quantidade<>-1){
        $sql .= " LIMIT {$inicio}, {$quantidade} ";
    }

    $resultados= $conexao->prepare($sql);
    $resultados-> execute();


    $ret['current']= $pagina;
    $ret['rowCount']=$resultados->rowCount();
    $ret['total']= $total;
    $ret['rows']= $resultados->fetchAll();

    echo json_encode($ret);

}catch(PDOException $exception){
    echo "Algo deu errado";
    echo $exception;

}