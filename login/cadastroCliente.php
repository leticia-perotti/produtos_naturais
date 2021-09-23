<?php
include_once ("../conexao.php");

include(__ROOT__ . '/documentacao.php');
$foto =asset('/fotos/logo_mini.png');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Natural Chá</title>

    <style>
        img{
            border-radius:50%;
            width: 30px;
            height: 30px;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_pt_BR.min.js" integrity="sha256-XPVq9FOi0rZTuUUM1OBNwLj/HPADmvgTT+KSuoDqjjw=" crossorigin="anonymous"></script>

    <!---<script>
        $(document).ready(function () {
            $('.telefone').mask('(00) 0000-00009', {clearIfNotMatch:true});
            $("form").validate();
        });
    </script>--->
    <script>
        $(document).ready(function () {
            $('.cpf').mask('000.000.000-00', {clearIfNotMatch:true});
            $("form").validate();
        });

        $(document).ready(function () {
            $('.telefone').mask('(00) 0000-00009', {clearIfNotMatch:true});
            $("form").validate();
        });

    </script>


</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="<?php echo $foto?>" class="d-inline-block align-top">
        Natural Chá
    </a>
</nav>

<div class="container">
    <h1> Cadastro de Cliente </h1>
    <hr>

    <form action="inserirCliente.php" method="post" class="jsonForm">
    <div class="form-group">
        <label for="nomeCliente">Nome completo</label>
        <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" placeholder="Nome Completo" required>
    </div>

    <div class="form-group">
        <label for="telefoneCliente">Telefone Celular</label>
        <input type="text" class="form-control telefone" name="telefoneCliente" id="telefoneCliente">
    </div>

    <div class="form-group">
        <label for="emailCliente">Email</label>
        <input type="email" class="form-control" id="emailCliente" name="emailCliente" placeholder="email@123.com" required>
    </div>

    <div class="form-group">
        <label for="cpfCliente">CPF</label>
        <input type="text" class="form-control cpf" name="cpfCliente" id="cpfCliente" required>
    </div>

    <div class="form-group">
        <label for="cidadeCliente">Cidade</label>
        <input type="text" class="form-control" id="cidadeCliente" name="cidadeCliente" required>
    </div>

    <div class="form-group">
        <label for="ufCliente">Unidade da Federação</label>
        <input type="text" class="form-control" id="ufCliente" name="ufCliente" required>
    </div>

    <div class="form-group">
        <label for="dataCliente">Data de nascimento</label>
        <input type="date" class="form-control" id="dataCliente" name="dataCliente" required>
    </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>


</div>
</body>

<!--<script>
    $(document).ready(function() {
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        //onClosing: function () {
                         //   history.back();
                        }
                      });
                    //$('.jsonForm').trigger('reset');
                }else {
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
</script>-->

<script>
    $(document).ready(function () {
        $('.jsonForm').ajaxForm ({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function () {
                            history.back();
                        }

                    });


                }else {
                    iziToast.error({
                        message: data.mensagem
                    });
                }

            },
            error: function(data){
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
            }
        });
    });
</script>