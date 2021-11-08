<?php

try{
    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT * FROM produto WHERE id=:id");
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
<body>

<p><strong>Codigo:</strong> <?php echo $linha->id; ?></p>
<p><strong>Nome:</strong> <?php echo $linha->nome; ?></p>
<p><strong>Quantidade:</strong> <?php echo $linha->quantidade; ?></p>


<p><a href="listagem_produtos.php">Voltar para listagem de produtos</a> </p>

</body>
</html>
