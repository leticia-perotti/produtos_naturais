<?php
define("DIRETORIO_IMAGEM", __DIR__ . '/../../imagens/');

try {

    //$conexao = new PDO(  'mysql:host=localhost;dbname=bd_natural', 'root', 'root' );
    //$conexao = new PDO(  'mysql:host=lab03-pc07;dbname=bd_natural', 'root', '' );
    $conexao = new PDO(  'mysql:host=localhost;dbname=bd_natural', 'root', '' );


    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $error) {
    echo "Codigo " . $error->getCode();
    echo "Mensagem " . $error->getMessage();
    echo "linha " . $error->getLine();
}


function retornaErro($mensagem)
{
    $retorno['status'] = false;
    $retorno['mensagem'] = $mensagem;

    echo json_encode($retorno);
    exit();

}

function retornaOK($mensagem)
{
    $retorno['status'] = true;
    $retorno['mensagem'] = $mensagem;

    echo json_encode($retorno);
    exit();
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

function validaCNPJ($cnpj)
{
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

    // Valida tamanho
    if (strlen($cnpj) != 14)
        return false;

    // Verifica se todos os digitos são iguais
    if (preg_match('/(\d)\1{13}/', $cnpj))
        return false;

    // Valida primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
    {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
        return false;

    // Valida segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
    {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}
