<?php


try{
    include "../configurações/conexao.php";

    $queryproduto = $conexao->query("SELECT * FROM fornecedor ORDER BY nome ASC");

}catch (PDOException $exception){
    echo $exception->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Cadastrar fornecedor</title>
</head>
<body>


<?php
include("../configurações/bootstrap.php");
include("../configurações/menu.php");
?>
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

<div class="container">
    <form action="inserir_fornecedor.php" method="post" class="jsonForm" enctype="multipart/form-data">
        <h1>Cadastro - Fornecedor</h1>


        <div class="form-group">
            <label for="nome">Nome do fornecedor</label>
            <input class="form-control" id="nome" type="text" name="nome" required >
        </div>

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input class="form-control cnpj " id="cnpj" type="text" name="cnpj" >
        </div>

        <div class="form-group">
            <label for="endereco">Endereco</label>
            <input class="form-control" id="endereco" type="text" name="endereco" required >
        </div>

        <div class="form-group">
            <label for="transportadora">Transportadora</label>
            <input class="form-control" id="transportadora" type="text" name="transportadora" required >
        </div>





<button type="submit" class="btn btn-primary">Cadastrar fornecedor</button>
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
                            document.location="listagem_fornecedor.php";

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
