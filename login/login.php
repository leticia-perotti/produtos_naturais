<?php

include_once ("../conexao.php");
//if (isset($_SESSION['cliente_autorizado']) && $_SESSION['cliente_autorizado']){
//    header("Location: /");
//    exit;
//}

include(__ROOT__ . '/documentacao.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../fotos/logo_mini.png">
    <title>Natural Chá</title>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_pt_BR.min.js" integrity="sha256-XPVq9FOi0rZTuUUM1OBNwLj/HPADmvgTT+KSuoDqjjw=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.cpf').mask('000.000.000-00', {clearIfNotMatch:true});
            $("form").validate();
        });
    </script>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .checkbox {
        font-weight: 400;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    a.hover{
        text-decoration: none;
    }


    .imagem{
        border-radius: 50%;
        width: 65%;
        padding: 10px;
      }
    .botao {
        margin-top: 5px;
        background: none;
        position: relative;
        font-weight: bold;
        font-size: inherit;
        width:100%;
        height:10%;
        border-width: medium;
        border-style: solid;
        border-color: burlywood;
        border-radius: 35px;
    }
    .botao:hover{
        background:burlywood;
        border-width: medium;
        border-style: solid;
        border-color: white;

    }
    .texto{
        font-family: "Open Sans", sans-serif;
        color: #7f757b;
        padding: 3px;
    }

</style>

<body class="text-center">

<div class="form-signin">
    <form action="verificaLogin.php" method="post" class="jsonForm">

        <center><img src="../fotos/logo_mini.png" class="imagem"></center>
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>


        <label for="email" class="sr-only">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@123.com" required>



        <label for="cpf" class="sr-only">CPF</label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="CPF" required>


        <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>

    </form>


    <br>

    <a href="cadastroCliente.php"><button type="button" class="bnt botao btn-lg btn-primary btn-block"><div class="texto">Cliente novo?
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
            </div>
        </button>
    </a>
</div>

</body>
<script>
    $(document).ready(function() {
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function () {
                            window.location = '<?php echo asset("inicial/index.php"); ?>';
                        }

                    });

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
</script>
