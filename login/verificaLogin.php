<?php


include_once("../conexao.php");
include(__ROOT__ . '/documentacao.php');

$email = $_POST['email'];
$cpf = $_POST['cpf'];


$conferir = $conexao->prepare('Select email, cpf from cliente where email=:email and cpf=:cpf');
$conferir->bindParam(":email", $email);
$conferir->bindParam(":cpf", $cpf);
$conferir->execute();


if ($conferir->rowCount() == 1) {
    echo "deu";
}