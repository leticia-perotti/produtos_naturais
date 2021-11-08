<?php
include("../configurações/segurança.php");
try{
    include "../configurações/conexao.php";

}catch (PDOException $exception){
    echo $exception->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar vendedor</title>
</head>
<body>

<?php
include("../configurações/bootstrap.php");
include("../configurações/menu.php");
?>

<div class="container">
    <form action="inserir_vendedor.php" method="post" class="jsonForm">
        <h1>Cadastro - Vendedor</h1>
        <div class="form-group">
            <label for="usuario">Nome Vendedor</label>
            <input class="form-control" id="usuario" type="text" name="usuario" required >
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" type="email" name="email" required >
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input class="form-control" id="senha" type="password" minlength="5" name="senha" required >
        </div>
        <div class="form-group">
            <label for="senhaok">Confirmação De Senha</label>
            <input class="form-control" id="senhaok" type="password" minlength="5" name="senhaok" required >
        </div>

<button type="submit" class="btn btn-primary">Cadastrar Vendedor</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $(' .jsonForm ').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true){
                    iziToast.success({
                        message: data.mensagem
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
