<?php

try{
    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT produto.id as idProduto, produto.nome as produto, produto.descricao as descricao, produto.peso as peso, produto.valor as valor, 
                                          produto.quantidade as quantidade, produto.valor_compra as valorCompra,  produto.ativo as status, produto.margem as margem, produto.tipo_venda as tipo,
                                          produto_foto.nome_foto as foto from produto left join produto_foto on produto.id=produto_foto.produto_id
                                          where produto.id=:id");
    $query->bindValue(":id", $_GET['id']);
    $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
    }
    $linha = $query->fetchObject();

    $queryCategoria= $conexao->prepare("Select categoria_produto.nome as categoria from 
                                                  categoria_produto inner join categoria_produto_has_produto on categoria_produto_has_produto.categoria_produto_id = categoria_produto.id
                                                  inner join produto on categoria_produto_has_produto.produto_idproduto = produto.id
                                                  where produto.id=:id");
    $queryCategoria->bindParam(":id", $linha->idProduto);
    $queryCategoria->execute();

    $linhaCategoria = $queryCategoria->fetchObject();

}catch(PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exibir Produtos</title>
    <?php
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    ?>
    <style>
        #imagem{
            width: 20%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Exibir dados do produto</h1>
    <br>
    <?php if ($linha->status == 2):
        ?>
        <div class="alert alert-warning" role="alert">
            Produto inativo
        </div>

    <?php elseif($linha->status == 1):
        ?>
        <div class="alert alert-success" role="alert">
            Produto ativo
        </div>
    <?php
    endif;
    ?>
    <div class="card">
        <div class="card-body">
            <p><strong>Codigo:</strong> <?php echo $linha->idProduto; ?></p>
            <p><strong>Nome:</strong> <?php echo $linha->produto; ?></p>
            <p><strong>Categoria:</strong> <?php echo $linhaCategoria->categoria; ?></p>
            <p><strong>Descrição:</strong> <?php echo $linha->descricao; ?></p>
            <p><strong>Peso:</strong> <?php echo $linha->peso; ?></p>
            <p><strong>Quantidade:</strong> <?php echo $linha->quantidade; ?></p>
            <p><strong>Valor:</strong> <?php echo formatar_valor($linha->valor); ?></p>
            <p><strong>Valor de compra:</strong> <?php echo formatar_valor($linha->valorCompra); ?></p>
            <p><strong>Margem:</strong> <?php echo formatar_valor($linha->margem); ?></p>
            <p><strong>Tipo de venda:</strong> <?php echo $linha->tipo; ?></p>
            <p><strong>Imagem:</strong>
                <?php

                if ($linha->foto && is_file(DIRETORIO_IMAGEM . $linha->foto)):
                ?>

            <center><img src="<?php echo imagem($linha->foto) ?>" id="imagem"></center>
            <?php
            endif;

            ?>
            </p>
        </div>
    </div>
    <br>



<p><a type="button" class="btn btn-primary float-right" href="listagem_produtos.php">Voltar para listagem de produtos</a> </p>

</body>
</html>
