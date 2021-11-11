<?php

try{
    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT * FROM fornecedor WHERE id=:id");
    $query->bindValue(":id", $_GET['id']);
    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
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
    <title>Exibir Produtos</title>
</head>
<?php
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<body>

<div class="container">
    <h1>Exibir dados do fornecedor</h1>
    <br>
    <div class="card">
        <div class="card-body">
            <p><strong>Codigo:</strong> <?php echo $linha->id; ?></p>
            <p><strong>Nome:</strong> <?php echo $linha->nome; ?></p>
            <p><strong>CNPJ:</strong> <?php echo $linha->cnpj; ?></p>
            <p><strong>Endereço:</strong> <?php echo $linha->endereco; ?></p>
            <p><strong>Transportadora:</strong> <?php echo $linha->transportadora; ?></p>
        </div>
    </div>
    <br>

<p><a type="button" class="btn btn-primary float-right" href="listagem_fornecedor.php">Voltar para listagem de fornecedor</a> </p>

</body>
</html>
