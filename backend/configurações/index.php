<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include "conexao.php";
    include "bootstrap.php";
    ?>
    <style>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
    </style>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <!-- Custom styles for this template -->
    <style>
        .imagem{
            border-radius: 50%;
            width: 150px;
            padding: 10px;
        }
    </style>
</head>
<body class="text-center">
<center><img src="logo_mini.png" class="imagem"></center>
<form class="form-signin jsonForm" action="VerificaSenha.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="usuario" class="sr-only">Usuario </label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
    <label for="Senha" class="sr-only">Senha</label>
    <input type="password" id="senha" class="form-control" name="senha" placeholder="Senha" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
</form>
</body>
</html>
<script>
    $(document).ready(function (){
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if(data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function () {
                            window.location='../produtos/cadastro_produtos.php'
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
                    mensage:'Servidor retornou erro'
                });
            }
        });
    });
</script>

