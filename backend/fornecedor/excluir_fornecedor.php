<?php

try {
    include "../configurações/conexao.php";

    if (!isset($_POST['id'])) {
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT * FROM fornecedor WHERE idproduto=:id");
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    if ($query->rowCount() >= 1) {
        retornaErro('Fornecedor não pode ser excluído ');
    }

    $query = $conexao->prepare("DELETE FROM fornecedor WHERE id=:id");
    $query->bindParam(':id', $_POST['id']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK( 'Excluído com sucesso');
    }
    else {
        retornaErro( 'Erro ao excluir');
    }

} catch (PDOException $exception) {
    echo $exception->getMessage();
}
