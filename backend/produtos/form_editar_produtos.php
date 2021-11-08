<?php
include ("../configurações/segurança.php");
try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse pela listagem');
    }

    $query = $conexao->PREPARE("SELECT * FROM produto WHERE id=:id");
    $query->bindValue(":id", $_GET['id']);

    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
    }

    $linhaproduto = $query->fetchObject();

}catch (PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Form Editar Produto</title>
</head>
<body>
<?php
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<div class="container">
<h1> Editar - Produto</h1>
<form action="editar_produtos.php" method="post" class="jsonForm">
    <div class="form-group">
        <label for="id">Código</label>
        <input class="form-control" id="id" type="text" name="id" readonly value="<?php echo $linhaproduto->id;?>">
    </div>

    <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $linhaproduto->nome;?>">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input class="form-control" id="descricao" type="text" name="descricao" value="<?php echo $linhaproduto->descricao;?>">
    </div>

    <div class="form-group">
        <label for="valor">Valor</label>
        <input class="form-control" id="valor" type="number" name="valor" value="<?php echo $linhaproduto->valor;?>">
    </div>

    <div class="form-group">
        <label for="peso">Peso</label>
        <input class="form-control" id="peso" type="number" name="peso" value="<?php echo $linhaproduto->peso;?>">
    </div>

    <div class="form-group">
        <label for="quantidade">Quantidade</label>
        <input class="form-control" id="quantidade" type="number" name="quantidade" value="<?php echo $linhaproduto->quantidade;?>">
    </div>

    <div class="form-group">
        <label for="valor_compra">Valor da compra</label>
        <input class="form-control" id="valor_compra" type="number" name="valor_compra" value="<?php echo $linhaproduto->valor_compra;?>">
    </div>

    <div class="form-group">
        <label for="link_foto">Foto</label>
        <input class="form-control" id="link_foto" type="file" name="link_foto" value="<?php echo $linhaproduto->link_foto;?>">
    </div>

    <div class="form-group">
        <label for="margem">Margem</label>
        <input class="form-control" id="margem" type="number" name="margem" value="<?php echo $linhaproduto->margem;?>">
    </div>

    <div class="form-group">
        <label for="tipo_venda">Tipo de venda</label>
        <input class="form-control" id="tipo_venda" type="text" name="tipo_venda" value="<?php echo $linhaproduto->tipo_venda;?>" >
    </div>



    <button type="submit" class="btn btn-primary">Editar produto</button>
</form>
</div>

<script>
    $(document).ready(function (){
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if(data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function(){
                            history.back();
                        }
                    });
                }else{
                    iziToast.error({
                        message: data.mensagem
                    });
                }
            },
            error:function (data){
                iziToast.error({
                    mensage:'Servidor retornou erro. '
                });
            }
        });
    });
</script>

</body>
</html>
