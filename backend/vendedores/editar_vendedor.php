<?php

try {
    include "../configurações/conexao.php";


    $query = $conexao->prepare("SELECT * FROM vendedores WHERE usuario=:usuario AND id<>:id");
    $query->bindValue(':usuario', $_POST['usuario']);
    $query->bindValue(':id', $_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('Vendedor já cadastrado.');
    }

    $query = $conexao->prepare("SELECT * FROM vendedores WHERE email=:email AND id<>:id");
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':id', $_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('Email já cadastrado.');
    }


    $query = $conexao->prepare("UPDATE vendedores SET usuario=:usuario, email=:email WHERE id=:id");
    $query->bindParam(':id',$_POST['id']);
    $query->bindParam(':usuario',$_POST['usuario']);
    $query->bindParam(':email',$_POST['email']);
    $query->execute();
    if ($_POST['senha'] != ''){
        if ($_POST['senha'] != $_POST['senhaok']) {
            retornaErro('Senha Inválida');
        }

        $senhaCriptografada = sha1($_POST['senha']);

        $query = $conexao->prepare("UPDATE vendedores SET senha=:senha where id=:id");
        $query->bindParam(':senha', $senhaCriptografada);
        $query->bindParam(':id', $_POST['id']);
        $query->execute();
    }
    if ($query->rowCount() == 1) {
        retornaOK('Alterado com sucesso. ');

    }else {
        retornaOK('Nenhum dado alterado. ');
    }

} catch (PDOException $exception) {
    retornaErro ( $exception->getMessage() );
}
