<?php

try{
    include_once("../conexao.php");

$email = $_POST['email'];
$cpf = $_POST['cpf'];


$conferir = $conexao->prepare('Select email, cpf, nome, id from cliente where email=:email and cpf=:cpf');
$conferir->bindParam(":email", $email);
$conferir->bindParam(":cpf", $cpf);
$conferir->execute();


if ($conferir->rowCount() == 1) {
    $achaID= $conferir->fetchObject();
    $cliente = $achaID-> id;

    $adicionaCliente = $conexao-> prepare('Update atendimento set cliente_idclientes=:cliente
                                                    where idatendimento=:id ');
    $adicionaCliente-> bindParam(':id', $_COOKIE['carrinho']);
    $adicionaCliente->bindParam(':cliente', $cliente);
    $adicionaCliente->execute();

    $_SESSION['cliente_autorizado'] = true;
   // $_SESSION['cliente_id'] = $cliente;
    //$_SESSION['cliente_nome'] = $achaID->nome;

    retornaOK("Autenticado com sucesso");
} else {
    retornaErro("Erro ao autenticar");
}
}catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}