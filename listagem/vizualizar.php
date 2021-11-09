<?php


try{
    require_once "../conexao.php";

    $vizualizar= $conexao->prepare("SELECT produto.id as id, produto.nome as nome, produto.valor as valor, produto.descricao as descricao, produto_foto.nome_foto as foto from produto left join produto_foto on produto.id=produto_foto.produto_id where produto.id=:id");
    $vizualizar-> bindValue(':id', $_GET['id']);
    $vizualizar-> execute();

    $linha = $vizualizar->fetch();
    $linha->valor = $linha->valor;
    $linha->valor_formatado = formatar_valor($linha->valor);


    $linha->foto = imagem($linha->foto);

    echo json_encode($linha);
    exit;

    if($vizualizar->rowCount()==0){
        exit ("Erro ao carregar o produto");
    }

    $linha= $vizualizar->fetchObject();

}catch (PDOException $exception){
    retornaErro("Erro ao inserir: " . $exception->getMessage());
}
?>