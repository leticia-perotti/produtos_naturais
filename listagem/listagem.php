<?php
include_once ("../conexao.php");

try{

include(__ROOT__ . '/documentacao.php');
include(__ROOT__ . '/componentes/menu.php');

if (isset($_GET["pesquisa"]) && $_GET["pesquisa"]!=''){
    $pesquisa = "%" . $_GET["pesquisa"] . "%";

    $query = $conexao->prepare('Select produto.id as id, produto.nome as nome, produto.valor as valor, produto.descricao as descricao, produto_foto.nome_foto from produto left join produto_foto on produto.id=produto_foto.produto_id where nome LIKE :pesquisa OR descricao LIKE  :pesquisa && ativo=1');
    $query->bindParam(":pesquisa", $pesquisa);
    $query->execute();

}else if(isset($_GET["categoria"]) !=''){

        $categoria = "%" . $_GET["categoria"] . "%";
        $query = $conexao->prepare('Select produto.id as id, produto.nome as nome, produto.valor as valor, produto.descricao as descricao from produto inner join categoria_produto_has_produto inner join categoria_produto
                                              left join produto_foto on produto.id=produto_foto.produto_id where (categoria_produto.nome LIKE :categoria) && (categoria_produto.id = categoria_produto_has_produto.categoria_produto_id
                                              && categoria_produto_has_produto.produto_idproduto = produto.id) && produto.ativo=1');
        $query->bindParam(":categoria", $categoria);
        $query->execute();

}else {
    $query = $conexao->query('Select produto.id as id, produto.nome as nome, produto.valor as valor, produto.descricao as descricao, produto_foto.nome_foto from produto left join produto_foto on produto.id=produto_foto.produto_id where ativo=1');

}

$foto =asset('/fotos/logo_mini.png');

?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>Natural Chá</title>
        <link rel="icon" href="<?php $foto?>">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                margin: 2%;
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
                min-height: 300px;
                min-width:190px;
                margin-left:10px;
                margin-right:10px;
                margin-bottom:5px;
                margin-top:20px;
                font-family:"Arial";
                text-align:center;
                display:inline-block;
                box-shadow: 3px 5px 3px 3px rgba(0, 0, 0, 0.3);
                position: relative;
                text-align: center;
            }
            #search{
                float: right;
            }
        </style>

    </head>
      <body>
      <div class="container">

        <form class="form-inline" id="search" action="" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="pesquisa" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>

    <h1> Produtos</h1>
        <div class="d-flex align-items-start row row-cols-md-5  row-cols-sm-2">



        <?php
        if($query->rowCount()==0){
            echo "<br><br>
               <div class='alert alert-warning' role='alert'>
               Nenhum produto encontrado!
               </div>";
        }
        while ($linha= $query->fetch()):
        ?>
            <div class="col">
                <div class="card" id="box">
                    <img src="<?php echo imagem($linha->nome_foto); ?>" class="img_produto">
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
            </div>
        <?php
        endwhile;
        ?>
        </div>


    </div>
    </div>
    <hr>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Voltar ao topo<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                    </svg></a></a>
            </p>
            <p>Natural Chá 2021</p>

        </div>
    </footer>
    <hr>

            </div>
        </div>
    </div>

    </div>


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

                        <img src="/imagens/sem-imagem.jpg" title="foto" id="imagem_modal">
                        <br>
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
                $.getJSON("vizualizar.php?id=" + id, function (data){
                    modal.find('#valor_modal').text(data.valor_formatado)
                    modal.find('.modal-title').text(data.nome)
                    modal.find('#descricao_modal').text(data.descricao)
                    modal.find('#qnt').attr('min', '1').attr('step', '0.1');
                    modal.find('#id_modal').val(data.id)
                    modal.find('#passa_valor').val(data.valor)
                    modal.find('#imagem_modal').attr('src', data.foto)
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




    </body>

    <?php

}catch (PDOException $exception) {
    echo $exception->getMessage();
    echo '<br>';
    echo "Deu erro!";

}?>
    </html>

