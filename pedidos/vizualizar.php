<?php


try {
    require_once "../conexao.php";

    if (isset($_GET["pesquisa"]) && $_GET["pesquisa"]!=''){
        $pesquisa = "%" . $_GET["pesquisa"] . "%";

        $query = $conexao->prepare('Select produto.nome as nome, atendimento_produto.quantidade as quantidade, atendimento_produto.valorproduto as valor, DATE_FORMAT(atendimento.data_carrinho, "%M %d %Y") as data, atendimento.status as status, atendimento_idatendimento as id
                                             from produto inner join atendimento_produto inner join atendimento
                                             on produto.id = atendimento_produto.produto_idproduto && atendimento_produto.atendimento_idatendimento=atendimento.idatendimento
                                             where atendimento.status!=1 && (nome LIKE :pesquisa OR descricao LIKE  :pesquisa) order by data');
        $query->bindParam(":pesquisa", $pesquisa);
        $query->execute();

    }else {
        $query = $conexao->query('Select produto.nome as nome, atendimento_produto.quantidade as quantidade, atendimento_produto.valorproduto as valor, DATE_FORMAT(atendimento.data_carrinho, "%d/%m/%Y") as data, atendimento.status as status, atendimento_idatendimento as id
                                             from produto inner join atendimento_produto inner join atendimento
                                             on produto.id = atendimento_produto.produto_idproduto && atendimento_produto.atendimento_idatendimento=atendimento.idatendimento
                                             where atendimento.status!=1 order by data');
    }

    $linha = $query->fetch();


    echo json_encode($linha);
    exit;

    if ($vizualizar->rowCount() == 0) {
        exit ("Erro ao carregar o produto");
    }

    $linha = $vizualizar->fetchObject();

} catch (PDOException $exception) {
    retornaErro("Erro ao inserir: " . $exception->getMessage());
}

