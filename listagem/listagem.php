<?php
include_once ("../conexao.php");

try{

include(__ROOT__ . '/documentacao.php');
include(__ROOT__ . '/componentes/menu.php');

$query = $conexao-> query('Select * from produto');

echo asset('/fotos/logo_mini.png');

?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>Natural Chá</title>
        <link rel="icon" href="/git/natural_cha_tcc/fotos/logo_mini.png">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../../../js/natural_cha_tcc/jquery.bootgrid.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">
        <style>
            .titulo{
                font-family: 'Pattaya', sans-serif;
                font-size: large;
            }
            .img_produto{
                width: 150px;
                align-items: center;
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
            }

            .img_produto:hover {
                opacity: 0.8;
            }
            #box{
                height: 300px;
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
            #search{
                float: right;
            }



        </style>

        <script src="../../../natural_cha_tcc/js/iziToast.js"></script>
        <script src="../../../natural_cha_tcc/js/iziToastExcluir.js"></script>

    </head>
      <body>
    <div class="container">
        <br><br><br>

    <h1> Produtos</h1>

        <form class="form-inline" id="search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>

        <?php
        while ($linha= $query->fetch()):
        ?>
            <div class="card" id="box">
                    <img src="" class="img_produto">
                    <div class="card-body">
                        <h5 class="card-title titulo"><?php echo $linha->nome; ?></h5>
                        <span class="card-text">R$ <?php echo $linha->valor; ?><br><?php echo $linha->descricao; ?></span>
                        <div class="d-grid gap-2">
                            <button type="button" class="bnt botao" data-toggle="modal" data-target="#vizualizar_produto" data-id="<?php echo $linha->id; ?>">
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


    </div>
    </div>



                <script src="/js/jquery.bootgrid.js"></script>
                <script src="/js/jquery.bootgrid.fa.js"></script>



    <hr class="row">
            </div>
        </div>
    </div>

    </div>


    <!-- Modal de adicionar produto -->
    <style>
        .modal-header {
            background-color: blanchedalmond;
        }
        .modal-title{
            font-family: 'Comfortaa', cursive;
            font-family: 'Pattaya', sans-serif;
            font-size: x-large;
        }
        #imagem_modal{
            width: 45%;
            float :left;
        }
        #imagem_modal:hover{
            opacity: 80%;
        }
        #lado{
            float: right;

        }
        #botao{
            background-color: blanchedalmond;
            color: black;
            border-style: none;
            float: right;
        }
        label{
            color: #5d5d5d;
        }

    </style>

    <div class="modal fade" id="vizualizar_produto" tabindex="-1" role="dialog" aria-labelledby="vizualizar_produtoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vizualizar_produtoLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="adicionar.php">
                    <div class="modal-body">

                        <img src="../fotos/camomila.jpg" title="Camomila" id="imagem_modal">
                        <div class="form-group row" id="lado">
                            <label class="col-sm-2 col-form-label">Valor: </label>
                            <br>
                            <div class="col-sm-10">
                                R$ <span id="valor_modal"><?php echo $linha->valor; ?></span>
                            </div>
                        </div>
                        <div class="form-group row" id="lado">
                            <label class="col-sm-2 col-form-label">Descrição: </label>
                            <br>
                            <div class="col-sm-10">
                                <span id="descricao_modal"><?php echo $linha->descricao; ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Quantidade </label>
                            <div class="col-sm-10">
                                <input type="text" id="exampleFormControlInput1" class="form-control-plaintext">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light" id="botao" >Adicionar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- fim do modal de servico -->

    <script type="application/javascript">
        $('#vizualizar_produto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            $.getJSON("vizualizar.php?id=" + id, function (data){
                modal.find('#valor_modal').text(data.valor)
                modal.find('.modal-title').text(data.nome)
                modal.find('#descricao_modal').text(data.descricao)
            })


        })

        $('#vizualizar_produto').on('hide.bs.modal', function (event) {
            var modal = $(this)
            modal.find('#valor_modal').text('')
            modal.find('.modal-title').text('')
            modal.find('#descricao_modal').text('')

        })
    </script>

    <?php
//    include 'vizualizar.php';
    ?>

    </body>




    </body>

    <?php

}catch (PDOException $exception) {
    echo $exception->getMessage();
    echo '<br>';
    echo "Deu erro!";

}?>
    </html>

