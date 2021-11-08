<?php
include ("../configurações/segurança.php");
try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse pela listagem');
    }

    $query = $conexao->PREPARE("SELECT * FROM vendedores WHERE id=:id");
    $query->bindValue(":id", $_GET['id']);

    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
    }

    $linhavendedor = $query->fetchObject();

}catch (PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Form Editar Vendedor</title>
</head>
<body>

<?php
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<div class="container">
    <h1> Editar - Vendedor</h1>
    <form action="editar_vendedor.php" method="post" class="jsonForm">

        <div class="form-group">
            <label for="id">Codigo</label>
            <input class="form-control" id="id" type="text" name="id" readonly value="<?php echo $linhavendedor->id;?>">
        </div>
        <div class="form-group">
            <label for="usuario">Nome</label>
            <input class="form-control" id="usuario" type="text" name="usuario" value="<?php echo $linhavendedor->usuario;?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input class="form-control" id="senha" type="password" minlength="5" name="senha">
        </div>
        <div class="form-group">
            <label for="senhaok">Confirmação de senha</label>
            <input class="form-control" id="senhaok" type="password" minlength="5" name="senhaok">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" type="email" name="email" value="<?php echo $linhavendedor->email;?>">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar vendedor</button>
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
