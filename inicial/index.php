<?php

include_once ("../conexao.php");

include(__ROOT__ . '/documentacao.php');
include(__ROOT__ . '/componentes/menu.php');



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="icon" href="../fotos/logo_mini.png">-->
    <title>Natural Chá</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">

    <style>
        .botao_animado_index {
            background: none;
            border: 0;
            position: relative;
            font-weight: bold;
            font-size: inherit;
            transition: all 500ms ease-in-out;
        }

        .botao_animado_index:after {
            content: '';
            transition: inherit;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: burlywood;
            position: absolute;
            top: -5%;
            left: -15px;
            opacity: 0.3;
            z-index: 1;
        }

        .botao_animado_index:hover:after {
            width: calc(100% + 20px);
            border-radius: 20px;

        }
        .box{
            height:250px;
            width:190px;
            background-color:#fff;
            margin-left:10px;
            margin-right:10px;
            margin-bottom:5px;
            margin-top:20px;
            font-family:"Arial";
            text-align:center;
            display:inline-block;

        }
        .classes{
            font-family:"Arial";
            font-size: large;
            font-weight: bold;
        }
        .titulo{
            font-family: 'Comfortaa', cursive;
            font-family: 'Pattaya', sans-serif;
            font-size: large;
        }

        .clicar {
            background: none;
            position: relative;
            font-weight: bold;
            font-size: inherit;
            margin-bottom: 2%;
            margin-top:2%;
            width:100%;
            height:100%;
            border-width: medium;
            border-style: solid;
            border-color: blanchedalmond;
            border-radius: 35px;
        }
        .clicar:hover{
            background:blanchedalmond;
          }
        #img_pdt{
            width: 150px;
            height: 150px;
        }
        #img_pdt:hover {

            opacity: 0.8;
        }
        #pdt{
            height: 265px;
            width:175px;
            margin-left: 15px;
            margin-right:15px;
            margin-bottom:20px;
            margin-top:20px;
            font-family:"Arial";
            text-align:center;
            display:inline-block;
            align-content: center;
            box-shadow: 3px 5px 3px 3px rgba(0, 0, 0, 0.3);
        }
        .link{
            display: inline-block;
            font-size: smaller;
            text-decoration: none;
        }

    </style>

      <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="boot5.css" rel="stylesheet">

</head>
<body>
<br>
                <img src="../fotos/nc.png" class="d-block w-100" alt="...">

<div class="container">


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <!--  Bolinhas com as categorias -->

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/produtos-naturais.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Produtos Naturais</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Produtos Naturais</h1>
        <p><button class="botao_animado_index" onclick="clicarNaturais()">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/cha.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Chás</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Chás</h1>
        <p><button class="botao_animado_index">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/confeitar.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Confeitaria</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Confeitaria</h1>
        <p><button class="botao_animado_index">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/bolo-embalagem.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Embalagens</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Embalagens</h1>
        <p><button class="botao_animado_index">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/chocolate.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Embalagens</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Chocolates</h1>
        <p><button class="botao_animado_index">Ir para &raquo;</button></p>
    </div>
    <!-- Fim das bolinhas com as categorias -->







    <!-- Produtos sugeridos -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <h2> Produtos sugeridos  <a href="../listagem/listagem.php" class="text-muted link">Vizualizar mais produtos</a></h2>

            <?php
            $query = $conexao-> query('Select * from produto');
            while ($linha= $query->fetch()):
                ?>
                <div class="card" id="pdt">
                    <img src="" class="img_pdt">
                    <div class="card-body">
                        <h5 class="card-title titulo"><?php echo $linha->nome; ?></h5>
                        <span class="card-text">R$ <?php echo $linha->valor; ?><br><?php echo $linha->descricao; ?></span>
                        <div class="d-grid gap-2">
                            <button type="button" class="bnt clicar" data-toggle="modal" data-target="#vizualizar_produto" data-id="<?php echo $linha->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>





    <!-- Fim produtos sugeridos -->

        <hr class="featurette-divider">

    <div class="row featurette">
        <h2> Feed do insta</h2>
    </div>

    <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Nossa localização, <span class="text-muted">vem vitar-nos!</span></h2>

                <p class="lead">Rua Prudente de Morais, 415<br>
                    União da Vitória<br>
                    Paraná, Brasil</p>
                <p>
                    <span class="text-muted">Horário de atendimento:</span><br>
                     De segunda a sexta das: <br>
                    9:00 até 12:00<br>
                    13:30 até 18:30<br>
                    Sábados:<br>
                    9:00 até 12:30<br>
                    Domingos e feriados:<br>
                    Fechado.
                </p>
            </div>
            <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d710.1243164633541!2d-51.08966799326457!3d-26.235623878131165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e6619f9f88af4b%3A0x3fe376a08446d25e!2sNatural%20Ch%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1621973878698!5m2!1spt-BR!2sbr" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

</main>


<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</body>
<script>
    function clicarNaturais() {
        window.location.href = "leticia/natural_cha_tcc/ilistagem/listagem.php";
    };
</script>

</html>
