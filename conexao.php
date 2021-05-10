<?php

$conexao = new PDO('mysql:host=localhost; dbname=bdnatural', 'root', 'root');

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

date_default_timezone_set ("America/Sao_Paulo");

/*function retornaErro ($mensagem){
    $retorno['status'] = false;
    $retorno['mensagem'] = $mensagem;

    echo json_encode($retorno);
    exit;

}

function retornaOK ($mensagem)
{
    $retorno['status'] = true;
    $retorno['mensagem'] = $mensagem;

    echo json_encode($retorno);
    exit;
}*/
?>
