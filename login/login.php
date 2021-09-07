<?php
include_once ("../conexao.php");
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

    .grid{
        alignment: center;
    }
    .text--center {
        text-align: center;
    }
    .imagem{
        border-radius: 50%;
        width: 20%;
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
<body class="align">
   <div class="container">

     <center><img src="../fotos/logo_mini.png" class="imagem"></center>

      <form action="verificaLogin.php" method="post" class="jsonForm">

          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@123.com" required>
          </div>

          <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control cpf" name="cpf" id="cpf" required>
          </div>

       <div class="form__field">
        <input type="submit" value="Login">
        </div>

    </form>
      <br>

      <button type="button" class="bnt botao"><div class="texto">Esqueceu a senha?
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
          </svg>
          </div>
      </button>

      <a href="cadastroCliente.php"><button type="button" class="bnt botao"><div class="texto">Cliente novo?
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
                        message: data.mensagem
                        //onClosing: function () {
                        //    history.back();
                       // }
                        //onClosing: function () {
                          //  window.location.href = "inicial/index.php";
                        //}
                    });
                    $('.jsonForm').trigger('reset');
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
