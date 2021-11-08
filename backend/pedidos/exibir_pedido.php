<?php

include("../configurações/segurança.php");

try{
    include ("../configurações/conexao.php");
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT * FROM atendimento_produto WHERE atendimento_idatendimento=:atendimento_idatendimento");
    $query->bindValue(":atendimento_idatendimento", $_GET['id']);
    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Pedido nao encontrado ");
    }
    $linha = $query->fetchObject();

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
            <h1 class="card-title titulo">Numero do pedido: <?php echo $linha->atendimento_idatendimento; ?></h1>
            <span class="card-text">Valor do produto R$:  <?php echo $linha->valorproduto; ?></span><br>
            <span class="card-title titulo">Qantidade: <?php echo $linha->quantidade; ?></span><br>
        </div>

    </div>

    </div>
<?php
endwhile;
?>

</body>
</html>
