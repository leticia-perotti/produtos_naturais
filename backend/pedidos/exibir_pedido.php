<?php

include("../configurações/segurança.php");

try{
    include ("../configurações/conexao.php");
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("Select atendimento_produto.quantidade as quantidade, produto.nome as produto, atendimento_produto.valorproduto as valor, atendimento_produto.atendimento_idatendimento as id,  produto_foto.nome_foto as foto from produto left join produto_foto on produto.id=produto_foto.produto_id
                                   inner join atendimento_produto where
                                   atendimento_produto.atendimento_idatendimento =:atendimento
                                   && produto.id = atendimento_produto.produto_idproduto;");
    $query->bindValue(":atendimento", $_GET['id']);
    $query->execute();

    if($query->rowCount()==0){
        exit("Pedido nao encontrado ");
    }
    //$linha = $query->fetchObject();

}catch(PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exibir Pedido</title>
</head>
<body>



<?php
while ($linha= $query->fetch()):
    ?>
<div class="container">
    <div class="alert alert-secondary" role="alert">
        <img src="" class="img_produto">
        <div class="card-body">
            <h1 class="card-title titulo">Numero do pedido: <?php echo $linha->produto; ?></h1>
            <span class="card-text">Produto :  <?php echo $linha->produto; ?></span><br>
            <span class="card-text">Valor do produto R$:  <?php echo $linha->valor; ?></span><br>
            <span class="card-title titulo">Qantidade: <?php echo $linha->quantidade; ?></span><br>
            <img src="<?php echo imagem($linha->nome_foto); ?>" class="img_produto">
        </div>

    </div>

    </div>
<?php
endwhile;
?>

</body>
</html>
