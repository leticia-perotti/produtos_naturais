<?php

include("../configurações/segurança.php");

try{
    include "../configurações/conexao.php";

    $queryproduto = $conexao->query("SELECT * FROM categoria_produto ORDER BY nome ASC");

}catch (PDOException $exception){
    echo $exception->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Categoria</title>
</head>
<body>

<?php
include("../configurações/bootstrap.php");
include("../configurações/menu.php");
?>

<div class="container">
    <form action="categoria_produto.php" method="post" class="jsonForm" enctype="multipart/form-data">
        <h1>Cadastro - Categoria</h1>


        <div class="form-group">
            <label for="nome">Nome do categoria</label>
            <input class="form-control" id="nome" type="text" name="nome" required >
        </div>

<button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
</form>
</div>

<script>
    $(document).ready(function () {
        $(' .jsonForm ').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true){
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function(){
                            document.location="cadastro_categoria.php";
                            history.back();
                        }
                    });
                    $('.jsonForm').trigger('reset');
                }else{
                    iziToast.error({
                        message: data.mensagem
                    });
                }
            },
            error: function (data) {
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
            }
        });
    });
</script>
</body>
</html>
