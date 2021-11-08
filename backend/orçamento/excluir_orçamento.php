<?php

try {

    include "../configurações/conexao.php";

    if (!isset($_POST['id'])) {
        die('Acesse atraves da listagem');
    }

    $query = $conexao->prepare("DELETE FROM orcamento_itens WHERE id=:id");
    $query->bindParam(':id', $_POST['id']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Excluido com sucesso');
    } else {
        retornaErro('Erro ao excluir');
    }

    echo "<br><a href=\"index.php\">Listagem</a>";
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
