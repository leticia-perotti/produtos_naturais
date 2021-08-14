<?php
require_once ("configuracao.php");
$conexao = new PDO('mysql:host=localhost; dbname=' . DBNAME, DBUSER, DBPASSWD);

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

date_default_timezone_set ("America/Sao_Paulo");

function retornaErro ($mensagem){
    $retorno['status'] = false;
    $retorno['mensagem'] = $mensagem;

    echo json_encode($retorno);
    exit;

}

function retornaOK ($mensagem){
    $retorno['status'] = true;
    $retorno['mensagem'] = $mensagem;

    echo json_encode($retorno);
    exit;


}


function asset($url){
    return __URL__ . $url;
}
function formatar_valor($numero)
{
    return number_format($numero, 2, ',', '.');
}

//define("__ROOT__", $_SERVER['DOCUMENT_ROOT'].'/');

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
