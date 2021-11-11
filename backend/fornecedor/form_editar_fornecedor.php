<?php
include ("../configurações/segurança.php");
try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse pela listagem');
    }

    $query = $conexao->PREPARE("SELECT * FROM fornecedor WHERE id=:id");
    $query->bindValue(":id", $_GET['id']);

    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
    }

    $linhafornecedor = $query->fetchObject();

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
<h1> Editar - Fornecedor</h1>
<form action="editar_fornecedor.php" method="post" class="jsonForm">
    <div class="form-group">
        <label for="id">Código</label>
        <input class="form-control" id="id" type="text" name="id" readonly value="<?php echo $linhafornecedor->id;?>">
    </div>

    <div class="form-group">
        <label for="nome">Nome do Fornecedor</label>
        <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $linhafornecedor->nome;?>">
    </div>

    <div class="form-group">
        <label for="descricao">CNPJ</label>
        <input class="form-control" id="cnpj" type="text" name="cnpj" value="<?php echo $linhafornecedor->cnpj;?>">
    </div>

    <div class="form-group">
        <label for="valor">Endereço</label>
        <input class="form-control" id="valor" type="text" name="endereco" value="<?php echo $linhafornecedor->endereco;?>">
    </div>

    <div class="form-group">
        <label for="transportadora">Transportadora</label>
        <input class="form-control" id="transportadora" type="text" name="transportadora" value="<?php echo $linhafornecedor->transportadora;?>">
    </div>

    <button type="submit" class="btn btn-primary">Editar fornecedor</button>
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
