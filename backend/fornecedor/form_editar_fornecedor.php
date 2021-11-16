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
    <?php
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    ?>
    <meta charset="UTF-8">
    <title>Form Editar Produto</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_pt_BR.min.js" integrity="sha256-XPVq9FOi0rZTuUUM1OBNwLj/HPADmvgTT+KSuoDqjjw=" crossorigin="anonymous"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $('.cnpj').mask('00.000.000/0000-00', {clearIfNotMatch:true});
            $("form").validate();
        });
    </script>
</head>
<body>

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
        <input class="form-control cnpj" id="cnpj" type="text" name="cnpj" value="<?php echo $linhafornecedor->cnpj;?>">
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
