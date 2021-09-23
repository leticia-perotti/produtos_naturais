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

function validaCPF ($cpf){
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
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
