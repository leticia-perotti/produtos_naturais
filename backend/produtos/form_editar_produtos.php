<?php
include ("../configurações/segurança.php");
try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse pela listagem');
    }

    $query = $conexao->PREPARE("SELECT produto.id as idProduto, produto.nome as produto, produto.descricao as descricao, produto.peso as peso, produto.valor as valor, 
                                          produto.quantidade as quantidade, produto.valor_compra as valorCompra,  produto.ativo as status, produto.margem as margem, produto.tipo_venda as tipo,
                                          produto_foto.nome_foto as foto from produto left join produto_foto on produto.id=produto_foto.produto_id
                                          where produto.id=:id
                                          ");
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
    <style>
        #imagem{
            width: 20%;
        }
    </style>


</head>
<body>
<?php
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<div class="container">
<h1> Editar - Produto</h1>
<form action="editar_produtos.php" method="post" class="jsonForm" enctype="multipart/form-data">
    <div class="form-group">
        <label for="id">Código</label>
        <input class="form-control" id="id" type="text" name="id" readonly value="<?php echo $linhaproduto->idProduto;?>">
    </div>

    <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $linhaproduto->produto;?>">
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
        <input class="form-control" id="valor_compra" type="number" name="valor_compra" value="<?php echo $linhaproduto->valorCompra;?>">
    </div>

    <div class="form-group">
        <label for="margem">Margem</label>
        <input class="form-control" id="margem" type="number" name="margem" value="<?php echo $linhaproduto->margem;?>">
    </div>

    <div class="form-group">
        <label for="tipo_venda">Tipo de venda</label>
        <input class="form-control" id="tipo_venda" type="text" name="tipo_venda" value="<?php echo $linhaproduto->tipo;?>" >
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input excluir_foto" type="radio" name="alterar" id="excluir_foto" value="excluir_foto">
        <label class="form-check-label" for="excluir_foto">Excluir imagem</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input trocar_foto" type="radio" name="alterar" id="trocar_foto" value="trocar_foto">
        <label class="form-check-label" for="trocar_foto">Editar imagem</label>
    </div>

    <div class="form-group">
        <label for="foto"> </label>
        <input type="file" class="form-control" id="link_foto" name="link_foto" disabled required>
    </div>

    <button type="submit" class="btn btn-primary">Editar produto</button>

       <?php

    if ($linhaproduto->foto && is_file(DIRETORIO_IMAGEM . $linhaproduto->foto)):
        ?>

        <center><img src="<?php echo imagem($linhaproduto->foto) ?>" id="imagem"></center>
    <?php
    endif;

    ?>

</form>
</div>

<script>
    $(document).ready(function (){
        $("#trocar_foto").on("click", function (){
            $("#link_foto").attr("disabled", !this.checked);
        })
        $("#excluir_foto").on("click", function (){
            $("#link_foto").attr("disabled", this.checked);
        });
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
