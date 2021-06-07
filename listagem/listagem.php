<?php


try{
    include "../documentacao.php";
    include "../menu.php";
    include "../conexao.php";


    try {
        $produto= $conexao-> query("Select *from produto");

    }catch (PDOException $exception ) {
        echo $exception->getMessage();
    }


    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../fotos/logo_mini.png">
        <title>Natural Chá</title>
        <link href="../../../js/natural_cha_tcc/jquery.bootgrid.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">
        <style>
            .titulo{
                font-family: 'Comfortaa', cursive;
                font-family: 'Pattaya', sans-serif;
                font-size: large;
            }
            .botao {
                background: none;
                position: relative;
                font-weight: bold;
                font-size: inherit;
                width:100%;
                height:10%;
                border-width: medium;
                border-style: solid;
                border-color: blanchedalmond;
                border-radius: 35px;
            }
            .botao:hover{
                background:blanchedalmond;
                border-width: medium;
                border-style: solid;
                border-color: white;

            }
            #img:hover {

                opacity: 0.8;
            }
            #box{
                height: 350px;
                width:190px;
                margin-left:10px;
                margin-right:10px;
                margin-bottom:5px;
                margin-top:20px;
                font-family:"Arial";
                text-align:center;
                display:inline-block;
                box-shadow: 3px 5px 3px 3px rgba(0, 0, 0, 0.3);
            }



        </style>

        <script src="../../../natural_cha_tcc/js/iziToast.js"></script>
        <script src="../../../natural_cha_tcc/js/iziToastExcluir.js"></script>
        <link href="boot5.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>


    <body>
    <div class="container">
       <br>
        <br>
        <br>
    <h1> Produtos</h1>
        <hr class="row">
            <div class="col-12">


                <div class="card" id="box">
                    <img src="../fotos/camomila.jpg" id="img">
                    <div class="card-body">
                        <h5 class="card-title titulo">Chá de Camomila</h5>
                        <span class="card-text">R$ 3,00<br>Pacote com 100g </span>
                        <div class="d-grid gap-2">
                            <button type="button" class="bnt botao" data-toggle="modal" data-target="#vizualizar_produto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </button>
                            <?php
                            include "vizualizar.php";
                            ?>
                        </div>
                    </div>
                </div>


                <div class="card" id= "box" style="width: 18rem">
            <a href="vizualizar.php">
                <img src="../fotos/camomila.jpg" id="img">
                <div class="card-body">
                    <h5 class="card-title titulo">Chá de Camomila</h5>
                    <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
            </a>
            <div class="d-grid gap-2">
                <a href="#"><button class="botao">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </button></a>
            </div>
        </div>
    </div>

    <div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div>

    <div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div>

    <div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div>

    <div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div>

    <div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div>
    <div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div><div class="card" id= "box" style="width: 18rem">
        <a href="vizualizar.php">
            <img src="../fotos/camomila.jpg" id="img">
            <div class="card-body">
                <h5 class="card-title titulo">Chá de Camomila</h5>
                <span class="card-text">R$ 3,00
                    <br>Pacote com 100g </span>
        </a>
        <div class="d-grid gap-2">
            <a href="#"><button class="botao">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </button></a>
        </div>
    </div>
    </div>



                <script src="../../../natural_cha_tcc/js/jquery.bootgrid.js"></script>
                <script src="../../../natural_cha_tcc/js/jquery.bootgrid.fa.js"></script>



                </ul>
            </div>
        </div>
    </div>
    </div>

    <hr class="featurette-divider">



    </body>




    </body>
    </html>


    <?php

}catch (PDOException $exception) {
    echo $exception->getMessage();
    echo '<br>';
    echo "Deu erro!";

}