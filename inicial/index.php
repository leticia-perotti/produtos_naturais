<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../fotos/logo_mini.png">
    <title>Natural Chá</title>

    <style>

        .botao {
            background: none;
            border: 0;
            position: relative;
            font-weight: bold;
            font-size: inherit;
            transition: all 500ms ease-in-out;
        }

        .botao:after {
            content: '';
            transition: inherit;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: burlywood;
            position: absolute;
            top: 15%;
            left: -10px;
            opacity: 0.3;
            z-index: -1;
        }

        .botao:hover:after {
            width: calc(100% + 20px);
            border-radius: 20px;
            opacity: 0.6;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .box{height:250px;
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
    </style>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="boot5.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="fotos/temperos.jpg" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <!-- Custom styles for this template -->
</head>
<body>

<?php
include "../menu.php";
?>
<BR>
<BR>
                <img src="../fotos/nc.png" class="d-block w-100" alt="...">

<div class="container">


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <!--  Bolinhas com as categorias -->

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/produtos-naturais.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Produtos Naturais</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Produtos Naturais</h1>
        <p><button class="botao">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/cha.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Chás</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Chás</h1>
        <p><button class="botao">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/confeitar.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Confeitaria</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Confeitaria</h1>
        <p><button class="botao">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/bolo-embalagem.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Embalagens</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Embalagens</h1>
        <p><button class="botao">Ir para &raquo;</button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/chocolate.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Embalagens</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Chocolates</h1>
        <p><button class="botao">Ir para &raquo;</button></p>
    </div>
    <!-- Fim das bolinhas com as categorias -->







        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Diversas variedades <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

            </div>
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
                    9:00 até 13:30<br>
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
</html>
