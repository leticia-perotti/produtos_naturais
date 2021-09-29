<?php
session_unset();
setcookie('carrinho', null, -1, '/');
include_once ("../conexao.php");
?>

<html>
<title>Natural Chá</title>
<style>
    .text{

        font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
        align-items: center;
        font-size: 80px;
        font-weight: 100;
        letter-spacing: 2px;
        color: #f35626;
        background-image: -webkit-linear-gradient(92deg, burlywood, #e4b696);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        -webkit-animation: hue 10s infinite linear;
    }
    .t{
        font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
        padding: 30px;
        font-size: 30px;
        font-weight: 100;
        letter-spacing: 2px;
    }
    .fim{
        font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
        padding: 30px;
        font-size: 20px;
        font-weight: 100;
        letter-spacing: 2px;
    }
    .sucesso{
        color: #3CB371;
    }

    .dots{
        display: flex;
        position: absolute;
        top: 75%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    .dots div{
        width: 50px;
        height: 50px;
        background-color: burlywood;
        border-radius: 50%;
        margin-left: 15px;
        animation: move 1s ease-in-out infinite alternate;
    }

    .dots div:nth-child(1){
        animation-delay: -0.4s;
    }
    .dots div:nth-child(2){
        animation-delay: -0.2s;
    }
    @keyframes move {
        from{
            transform: translateY(-100%);
        } to {
              transform: translateY(100%);
          }

    }
</style>
<body>
<div class="container">
    <br><br>
    <center><p class="fim">Seu pedido foi finalizado com <span class="sucesso">sucesso</span></p></center>

    <center><p class="t">Obrigada por comprar na</p></center>
    <center><h1 class="text">Natural Chá</h1></center>


    <div class="dots">
        <div></div>
        <div></div>
        <div></div>
    </div>

</div>
<script>
    setTimeout(function() {
        window.location = '<?php echo asset("inicial/index.php"); ?>';
    }, 3000);
</script>


</body>
</html>

