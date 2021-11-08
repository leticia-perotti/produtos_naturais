<?php
include "../configurações/conexao.php";
try {
    $query=$conexao->prepare("UPDATE atendimento set status=3 WHERE idatendimento=:id");
    $query-> bindValue(":id",$_POST ['id']);
    $query->execute();

    if($query->rowCount()==1){
        retornaOK("Status alterado com sucesso");
    }else{
        retornaErro("ERRO");
    }
}catch (PDOException $exception){
    echo $exception->getMessage();
}