<?php

try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT * FROM cliente WHERE id=:id");
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
    <title>Exibir cliente</title>
</head>
<?php
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<body>
<div class="container">
    <h1>Exibir dados do cliente</h1>
    <br>
    <div class="card">
        <div class="card-body">
            <p><strong>Código:</strong> <?php echo $linha->id; ?></p>
            <p><strong>Nome:</strong> <?php echo $linha->nome; ?></p>
            <p><strong>Telefone:</strong> <?php echo $linha->telefone; ?></p>
            <p><strong>Cidade:</strong> <?php echo $linha->cidade; ?></p>
            <p><strong>Uf:</strong> <?php echo $linha->uf; ?></p>
            <p><strong>Email:</strong> <?php echo $linha->email; ?></p>
            <p><strong>CPF:</strong> <?php echo $linha->cpf; ?></p>
        </div>
    </div>
    <br>

    <p><a type="button" class="btn btn-primary float-right" href="listagem_cliente.php">Voltar a lista de clientes</a> </p>
</div>


</body>
</html>
