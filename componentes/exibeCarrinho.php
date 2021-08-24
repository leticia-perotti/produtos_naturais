<?php
try {
    require_once "../conexao.php";

    $query = $conexao->prepare('Select atendimento_produto.quantidade as quantidade, produto.nome as produto, atendimento_produto.valorproduto as valor
                                   from produto, atendimento_produto where
                                   atendimento_produto.atendimento_idatendimento =:atendimento
                                   && produto.id = atendimento_produto.produto_idproduto;');
    $query->bindParam(":atendimento", $_COOKIE['carrinho']);
    $query->execute();

    $linha = $query->fetch();
   // $linha-> valor = formatar_valor($linha->valor);

    echo json_encode($linha);
    exit;

    if ($query->rowCount() == 0) {
        exit ("Erro ao carregar o carrinho");
    }

    $linha = $query->fetchObject();

} catch (PDOException $exception) {
    echo $exception->getMessage();
    echo "Deu erro!";
}

