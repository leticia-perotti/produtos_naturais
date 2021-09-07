<?php

try{
include_once("../conexao.php");

$email = $_POST['email'];
$cpf = $_POST['cpf'];


$conferir = $conexao->prepare('Select email, cpf, id from cliente where email=:email and cpf=:cpf');
$conferir->bindParam(":email", $email);
$conferir->bindParam(":cpf", $cpf);
$conferir->execute();

$achaID= $conferir->fetchObject();

if ($conferir->rowCount() == 1) {
    $cliente = $achaID-> id;

    $adicionaCliente = $conexao-> prepare('Update atendimento set cliente_idclientes=:cliente
                                                    where idatendimento=:id ');
    $adicionaCliente-> bindParam(':id', $_COOKIE['carrinho']);
    $adicionaCliente->bindParam(':cliente', $cliente);
    $adicionaCliente->execute();

    retornaOK("Autenticado com sucesso");
} else {
    retornaErro("Erro ao autenticar");
}
}catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}