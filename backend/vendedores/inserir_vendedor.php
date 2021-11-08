<?php

try {
    include "../configurações/segurança.php";
    include "../configurações/conexao.php";



    $query = $conexao->prepare("SELECT * FROM vendedores WHERE usuario=:usuario");
    $query->bindValue(':usuario',$_POST['usuario']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('Usuario já existente');
    }

    $query = $conexao->prepare("SELECT * FROM vendedores WHERE email=:email");
    $query->bindValue(':email',$_POST['email']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('E-mail já existente');
    }

    if($_POST['senha']!=$_POST['senhaok']){
        retornaErro('Senhas diferentes');
    }

    $senhaCriptografada = sha1($_POST['senha']);

    $query = $conexao->prepare("INSERT INTO vendedores (usuario,email,senha)VALUES(:usuario,:email,:senha) ");
    $query->bindValue(':usuario',$_POST['usuario']);
    $query->bindValue(':email',$_POST['email']);
    $query->bindParam(':senha', $senhaCriptografada);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Inserido com sucesso ');
    } else {
        retornaErro('Erro ao inserir');
    }

} catch (Exception $exception) {
    retornaErro($exception->getMessage());
}
