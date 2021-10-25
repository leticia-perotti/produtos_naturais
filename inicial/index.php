<?php

include_once ("../conexao.php");

include(__ROOT__ . '/documentacao.php');
include(__ROOT__ . '/componentes/menu.php');

$produtos = asset('/listagem/listagem.php');
$foto = asset('/fotos/nc.png');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Natural Chá</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">

    <style>
        .botao_animado_index {
            position: relative;
            font-weight: bold;
            font-size: inherit;
            margin-bottom: 2%;
            margin-top:2%;
            margin-bottom: 2%;
            width:150px;
            height:35px;
            background: burlywood;
            opacity: 0.3;
            border-radius: 35px;
            border: none;

        }
        .link_certo{
            text-decoration: none;
            color: black;
        }
        .link_certo:hover{
            text-decoration: none;
            color: black
        }


        .box{
            height:250px;
            width:200px;
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
            width:15%;
            margin-left: 2.5%;
            margin-right:2.5%;
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
        .info{
            padding: 3%;
            padding-right: 10%;
            background-color: #cdcdcd;
            text-align: center;
        }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
<br>

<img src="<?php echo $foto?>" class="d-block w-100" alt="...">

<div class="container">

    <!--  Bolinhas com as categorias -->

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/produtos-naturais.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Produtos Naturais</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Produtos Naturais</h1>
        <p><button class="text-muted botao_animado_index"><a class="link_certo" href="<?php echo $produtos. "?categoria=produtos-naturais"?>">Ir para &raquo;</a></button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/cha.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Chás</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Chás</h1>
        <p><button class="text-muted botao_animado_index"><A class="link_certo" href="<?php echo $produtos. "?categoria=chas"?>">Ir para &raquo;</A></button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/confeitar.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Confeitaria</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Confeitaria</h1>
        <p><button class="text-muted botao_animado_index"><a class="link_certo" href="<?php echo $produtos. "?categoria=confeitaria"?>">Ir para &raquo;</a></button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/bolo-embalagem.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Embalagens</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Embalagens</h1>
        <p><button class="text-muted botao_animado_index"><a class="link_certo" href="<?php echo $produtos. "?categoria=embalagens"?>">Ir para &raquo;</a></button></p>
    </div>

    <div class="box">
        <img class="bd-placeholder-img rounded-circle" width="100" height="100" role="img" src="../fotos/chocolate.jpg"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Embalagens</title><rect width="50%" height="50%" fill="#777"/><text x="30%" y="30%" fill="#777" dy=".3em"></text></img>
        <h1 class="classes">Chocolates</h1>
        <p><button class="text-muted botao_animado_index"><a class="link_certo" href="<?php echo $produtos. "?categoria=chocolates"?>">Ir para &raquo;</a></button></p>
    </div>
    <!-- Fim das bolinhas com as categorias -->

    <!-- Produtos sugeridos -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <h2> Produtos sugeridos  <a href="../listagem/listagem.php" class="text-muted link">Vizualizar mais produtos</a></h2>

            <?php
            $query = $conexao-> query('Select * from produto where ativo=1 order by id DESC limit 5');
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
        </div>





    <!-- Fim produtos sugeridos -->

        <hr class="featurette-divider">

    <div class="row featurette">
        <h2> Feed do insta</h2>
    </div>


</div><!-- /.container -->


    <hr class="featurette-divider">

        <div class="row featurette info">

                <div class="col-md-7">
                    <h2 class="featurette-heading">Nossa localização, <span class="text-muted">venha visitar-nos!</span></h2>

                    <p class="lead">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>Rua Prudente de Morais, 415<br>
                        União da Vitória<br>
                        Paraná, Brasil</p>
                    <h6>
                        Horário de atendimento:
                        <span class="text-muted"><br>
                         De segunda a sexta das: <br>
                        9:00 até 12:00<br>
                        13:30 até 18:30<br>
                        Sábados:<br>
                        9:00 até 12:30<br>
                        Domingos e feriados:<br>
                        Fechado.
                        </span>
                    </h6>
                </div>
                <div class="col-md-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d710.1243164633541!2d-51.08966799326457!3d-26.235623878131165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e6619f9f88af4b%3A0x3fe376a08446d25e!2sNatural%20Ch%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1621973878698!5m2!1spt-BR!2sbr" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            <br>
            <hr class="featurette-divider">

            <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <footer class="text-muted">
                <div class="container">
                    <p class="float-right">
                        <a href="#">Voltar ao topo
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                            </svg></a>
                    </p>
                    <p>Natural Chá 2021</p>

                </div>
            </footer>
            <hr class="row">
</body>


        </div>


        <!-- /END THE FEATURETTES -->

<!-- Modal de adicionar produto -->
<style>
    .cabecalho {
        background-color: #ffebd0;
    }
    .titulo_do_modal{
        font-family: 'Comfortaa', cursive;
        font-family: 'Pattaya', sans-serif;
        font-size: x-large;
    }

    #imagem_modal{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    #imagem_modal{
        width: 50%;
        justify-content: center;
    }
    #imagem_modal:hover{
        opacity: 80%;
    }
    .botaoAdicionar{
        float: right;
        margin: 2%;
    }
    input[type=number]::-webkit-inner-spin-button {
        all: unset;
        min-width: 21px;
        min-height: 45px;
        margin: 17px;
        padding: 0px;
        background-image:
                linear-gradient(to top, transparent 0px, transparent 16px, #fff 16px, #fff 26px, transparent 26px, transparent 35px, #000 35px,#000 36px,transparent 36px, transparent 40px),
                linear-gradient(to right, transparent 0px, transparent 10px, #000 10px, #000 11px, transparent 11px, transparent 21px);
        transform: rotate(90deg) scale(0.8, 0.9);
        cursor:pointer;
    }


</style>

<div class="modal fade" id="vizualizar_produto" tabindex="-1" role="dialog" aria-labelledby="vizualizar_produtoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header cabecalho">
                <h5 class="modal-title titulo_do_modal" id="vizualizar_produtoLabel"></h5>
                <button type="button" class="close bnt btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adicionar.php" method="post" class="jsonForm">
                <div class="modal-body container">

                    <img src="../fotos/camomila.jpg" title="Camomila" id="imagem_modal">
                    <div class="form-group row" id="lado_descricao">
                        <label class="col-sm-2 col-form-label">Valor: </label>
                        <br>
                        <div class="col-sm-10">
                            R$ <span id="valor_modal"><?php echo $linha->valor; ?></span>
                        </div>
                        <br>
                        <label class="col-sm-2 col-form-label">Descrição: </label>
                        <div class="col-sm-10">
                            <span id="descricao_modal"><?php echo $linha->descricao; ?></span>
                        </div>
                        <br>
                    </div>

                    <div class="input-group">
                        <label for="quantidade">Quantidade:</label><br>
                        <input type="number" class="form-control" aria-describedby="basic-addon2" id="total" name="qnt" step="1" value="1" min="1" required>

                    </div>
                    <small id="minimo" class="form-text text-muted">Para produtos à granel o mínimo é 100g</small>


                    <!--<div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" id="qnt" name="qnt" class="form-control" step="2" value="1" min="1" required><button id="botaozinho" class="a btn btn-danger ">-</button><button id="botaozinho" onclick="mais()" class="b btn btn-success">+</button>
                        <small id="minimo" class="form-text text-muted">Para produtos à granel o mínimo é 100g</small>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="qnt">Quantidade </label>
                        <div class="col-sm-10"><br>
                            <input type="number" id="qnt" name="qnt" class="form-control-plaintext" border="medium solid black" required>
                        </div>
                    </div>-->
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success botaoAdicionar">Adicionar</button>
                    <input type="hidden" name="id" id="id_modal">
                    <input type="hidden" name="valor" id="passa_valor">

                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- fim do modal de servico -->


</main>



    <script>

    $(document).ready(function() {

        function mais(){
            var atual = document.getElementById("total").value;
            var novo = atual - (-1); //Evitando Concatenacoes
            document.getElementById("total").value = novo;
        }

        function menos(){
            var atual = document.getElementById("total").value;
            if(atual > 0) { //evita números negativos
                var novo = atual - 1;
                document.getElementById("total").value = novo;
            }
        }

        atualizaCarrinho();

        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem
                    });
                    $('.jsonForm').trigger('reset');
                    $('#vizualizar_produto').modal("hide");
                    atualizaCarrinho();
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

        $('#vizualizar_produto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            $.getJSON("visualizar.php?id=" + id, function (data){
                modal.find('#valor_modal').text(data.valor_formatado)
                modal.find('.modal-title').text(data.nome)
                modal.find('#descricao_modal').text(data.descricao)
                modal.find('#qnt').attr('min', '1').attr('step', '0.1');
                modal.find('#id_modal').val(data.id)
                modal.find('#passa_valor').val(data.valor)
            })


        })

        $('#vizualizar_produto').on('hide.bs.modal', function (event) {
            var modal = $(this)
            modal.find('#valor_modal').text('')
            modal.find('.modal-title').text('')
            modal.find('#descricao_modal').text('')
            modal.find('#qnt').attr('min', '1').attr('step', 'any');
            modal.find('#id_modal').text('')

        })

    });


</script>
</body>





</html>
