<?php
try{
    include "../configurações/conexao.php";

    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT * from compra_has_produto where produto_idproduto=:id order by id desc");
    $query->bindValue(":id", $_GET['id']);
    $query->execute();

    if($query->rowCount()==0):
        ?>
        <div class="alert alert-warning" role="alert">
            O produto não possui histórico de compra!
        </div>
        <p><a type="button" class="btn btn-primary float-right" href="listagem_produtos.php">Voltar para listagem de produtos</a> </p>

    <?php
    exit;
    endif;

    $queryNome = $conexao->prepare("Select * from produto where id=:id");
    $queryNome->bindValue(":id", $_GET['id']);
    $queryNome->execute();

    $nome= $queryNome->fetch();

}catch(PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Histórico do Produto</title>

</head>
<body>
<div class="container">
    <h1>Histórico de compra do produto</h1>

    <br>
    <h1><?php echo $nome->nome; ?></h1>
    <h3>Ultimo valor de compra <?php echo formatar_valor($nome->valor_compra); ?></h3>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Valor de compra</th>
            <th scope="col">Data</th>
            <th scope="col">Fornecedor</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($linha=$query->fetchObject()):
        $queryData = $conexao->prepare("Select *, DATE_FORMAT(data, '%d/%m/%Y') as data from compra where id =:id");
        $queryData->bindParam(":id", $linha->compra_idcompras);
        $queryData->execute();

        $linhaData = $queryData->fetchObject();

        $queryFornecedor = $conexao->prepare("Select * from fornecedor where id=:id");
        $queryFornecedor->bindParam(":id", $linhaData->fornecedor_idfornecedor);
        $queryFornecedor->execute();

        $linhaForncedor = $queryFornecedor->fetchObject();
        ?>
        <tr>

            <td><?php echo formatar_valor($linha->preco); ?></td>
            <td><?php echo $linhaData->data; ?></td>
            <td><?php echo $linhaForncedor->nome; ?></td>
        </tr>
        <?php
        endwhile;
        ?>
        </tbody>
    </table>

    <br>



    <p><a type="button" class="btn btn-primary float-right" href="listagem_produtos.php">Voltar para listagem de produtos</a> </p>

</body>
</html>
