<?php
try{
    include "../configurações/segurança.php";
    include "../configurações/conexao.php";



    if($_POST['senha']!=$_POST['confSenha']){
        retornaErro('Senha inserida nao esta igual');
    }




    $query = $conexao->prepare("INSERT INTO orcamento_itens (idveiculo, idorcamento, valor) VALUES (:idveiculo, :idorcamento, :valor)");
    $query->bindValue(':idveiculo', $_POST['idveiculo']);
    $query->bindValue(':idorcamento', $_POST['idorcamento']);
    $query->bindValue(':valor', $_POST['valor'] );
    $query->execute();

    if($query->rowCount()==1){
        retornaOK('Inserido com sucesso.');
    }else{
        retornaErro('Erro ao inserir');
    }


}catch (Exception $exception){
    retornaErro($exception->getMessage());
}
