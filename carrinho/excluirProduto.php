<?php

try {
    include_once("../conexao.php");

    $query = $conexao->prepare("DELETE FROM atendimento_produto WHERE idatendimento_produto=:id");
    $query->bindParam(':id', $_POST['id']);
    $query->execute();

    if ($query->rowCount() >= 1) {
        retornaOK( 'Excluido com sucesso');
    }
    else {
        retornaErro( 'Erro ao excluir');
    }

}catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}
