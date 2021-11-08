<?php
try {
    include "../configurações/conexao.php";


    if (!isset($_POST['id'])) {
        retornaErro("Acesse pela listagem");
    }

    $deleta = $conexao->prepare("Delete from compra_has_produto where id=:id");
    $deleta->bindValue(":id", $_POST['id']);
    $deleta->execute();

    if ($deleta->rowCount() == 1) {
        retornaOK("Item excluido com sucesso!");
    } else {
        retornaErro("Erro ao excluir");
    }

} catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}