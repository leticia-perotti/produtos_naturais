<?php

try {

    include "../configurações/conexao.php";
    if(validaCPF($_POST['cpf'])==false){
        retornaErro('CPF inválido');
    }

    $query = $conexao->prepare("SELECT * FROM cliente WHERE nome=:nome AND id<>:id");
    $query->bindValue(':nome',$_POST['nome']);
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('nome já existente');
    }
    $query = $conexao->prepare("SELECT * FROM cliente WHERE telefone=:telefone AND id<>:id");
    $query->bindValue(':telefone',$_POST['telefone']);
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('telefone já existente');
    }

    $query = $conexao->prepare("SELECT * FROM cliente WHERE cpf=:cpf AND id<>:id");
    $query->bindValue(':cpf',$_POST['cpf']);
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('cpf já existente');
   }
    $query = $conexao->prepare("SELECT * FROM cliente WHERE email=:email AND id<>:id");
    $query->bindValue(':email',$_POST['email']);
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('E-mail já existente');
   }

    $query = $conexao->prepare("UPDATE cliente SET nome=:nome, telefone=:telefone, cidade=:cidade, uf=:uf, email=:email, cpf=:cpf, datanascimento=:datanascimento WHERE id=:id");
    $query->bindParam(':id',$_POST['id']);
    $query->bindParam(':nome',$_POST['nome']);
    $query->bindParam(':telefone',$_POST['telefone']);
    $query->bindParam(':cidade',$_POST['cidade']);
    $query->bindParam(':uf',$_POST['uf']);
    $query->bindParam(':email',$_POST['email']);
    $query->bindParam(':cpf',$_POST['cpf']);
    $query->bindParam(':datanascimento',$_POST['datanascimento']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Alterado com sucesso. ');

    } else {
        retornaOK('Nenhum dado alterado. ');
    }

} catch (PDOException $exception) {
    retornaErro ( $exception->getMessage() );
}
