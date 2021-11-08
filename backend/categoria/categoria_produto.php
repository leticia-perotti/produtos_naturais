<?php

try {

    include "../configurações/conexao.php";
    if(isset($_POST["nome"]) && $_POST["nome"]!=''){
        $verifica = "%" . $_POST["nome"] . "%";
    }
    $verifica= $conexao->prepare("SELECT * FROM categoria_produto WHERE nome like :nome");
    $verifica->bindValue(':nome',$_POST['nome']);
    $verifica->execute();

    if ($verifica->rowCount() == 1) {
        retornaErro('Nome do produto já existente');
    }
    $query = $conexao->prepare("INSERT INTO categoria_produto (nome) VALUES(:nome)");
    $query->bindValue(':nome',$_POST['nome']);

    $query->execute();



    if ($query->rowCount() == 1) {
        retornaOK('Inserido com sucesso ');

    } else {
        retornaErro('Erro ao inserir');
    }

} catch (Exception $exception) {
    retornaErro($exception->getMessage());
}
