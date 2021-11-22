<?php
include_once ("../conexao.php");

try {

    include(__ROOT__ . '/documentacao.php');
    include(__ROOT__ . '/componentes/menu.php');

    $query = $conexao->prepare('Select atendimento_produto.quantidade as quantidade, produto.nome as produto, atendimento_produto.valorproduto as valor, idatendimento_produto as id,  produto_foto.nome_foto from produto left join produto_foto on produto.id=produto_foto.produto_id
                                   inner join atendimento_produto where
                                   atendimento_produto.atendimento_idatendimento =:atendimento
                                   && produto.id = atendimento_produto.produto_idproduto;');
    $query->bindParam(":atendimento", $_COOKIE['carrinho']);
    $query->execute();

    $foto = asset('/fotos/logo_mini.png');

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>Natural Chá</title>
        <link rel="icon" href="<?php $foto ?>">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="<?php echo asset("/js/iziToastExcluir.js"); ?>"></script>


        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&family=Pattaya&display=swap"
              rel="stylesheet">
        <style>
            #search{
                float: right;
            }
            .alert-secondary{
                min-height: 15%;
                width: 100%;
            }
            #imagem_tabela{
                min-width: 20%;
            }
            #dados_tabela{
                text-align: justify;
                min-width: 30%;
            }
            #input_quantidade{
                min-width: 30%;
            }
            #botao_tabela{
                min-width: 10%;
            }
            table{
                align-items: center;
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
            button{
                margin: 2%;
            }

            .img_produto{
                width: 100px;
                align-content: center;
            }

            .listagem-carrinho .linha {
                position: relative;
                padding: .75rem 1.25rem;
                margin-bottom: 1rem;
                border: 1px solid transparent;
                border-radius: .25rem;
                color: #383d41;
                background-color: #e2e3e5;
                border-color: #d6d8db;
            }


        </style>
    </head>
    <body>
    <div class="container listagem-carrinho">

        <h1> Carrinho</h1>

    <?php
    while ($linha= $query->fetch()):
        ?>
            <div class="row linha">


                <div class="col-md-2 col-sm-4 col-12" id1="imagem_tabela">
                    <img src="<?php echo imagem($linha->nome_foto); ?>" class="img-fluid">
                </div>
                <div class="col-md-6 col-sm-8 col-12" id1="dados_tabela">
                        <h5 class="card-title titulo"><?php echo $linha->produto; ?></h5>
                        <span class="card-text">R$ <?php echo formatar_valor($linha->valor); ?></span>
                </div>

                <div class="col-md-2 col-10" id1="input_quantidade">

                        <label for="validationDefault05">Quantidade</label>
                        <input type="number" class="form-control adiciona" id="quantidade" value="<?php echo $linha->quantidade; ?>" min="1" required>

                </div>
                <div class="col-md-2 col-2" id1="botao_tabela">
                    <button type="button" class="btn btn-secondary acionaAdiciona" data-row-id="<?php echo $linha->id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                    </button>
                    <br>

                    <button type="button" class="btn btn-danger command-delete" data-row-id="<?php echo $linha->id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </div>
        </div>


    <?php
    endwhile;
    ?>

<br>
            <div class="alert alert-warning" role="alert">
                Valor parcial do carrinho: R$ <span id="valorTotal"></span>
            </div>

            <a href="<?php echo asset("/carrinho/finalizaCarrinho.php")?>" class="btn btn-success">Finalizar compra</a>




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
    </body>
    </html>
    <script>

        var btnExcluir;
        var bntAdicionar;
        $(document).ready(function(){

           $(".command-delete").on("click", function (e) {
               btnExcluir = $(this);
               iziToastExcluir($(this).data("row-id"));
            });

           $(".adiciona").on("blur", function(e) {
              $(this).parent().parent().find('.acionaAdiciona').trigger("click");
           });

            $(".acionaAdiciona").on("click", function (e) {
                bntAdicionar = $(this);
                id = $(this).data("row-id");
                quantidade = bntAdicionar.parent().parent().find(".adiciona").val();
                // console.log(quantidade)
                adicionar(id, quantidade);
            });

            atualizaValorTotal();

        });

        var adiciona = $(".adiciona");

        function adicionar(id, quantidade) {
            $.post(
                'adicionaCarrinho.php',
                {id: id, quantidade: quantidade},
                function (data) {
                    if (data.status == true) {
                        atualizaValorTotal();
                        iziToast.success({
                            message: data.mensagem
                        });
                        atualizaCarrinho();
                    } else {
                        iziToast.error({
                            message: data.mensagem
                        });
                    }
                },
                'json'
            );
        }

        function excluir(id) {
            $.post(
                "excluirProduto.php",
                {id: id},
                function (data) {
                    if (data.status == 0) {
                        iziToast.error({
                            message: data.mensagem
                        });
                    } else {
                        atualizaValorTotal();
                        iziToast.success({
                            message: data.mensagem
                        });
                        btnExcluir.parent().parent().remove();//oculta a linha
                    }
                },
                "json"
            );
        }

        function atualizaValorTotal() {
            $.getJSON(
                "valorCarrinho.php",
                function(data){
                    $("#valorTotal").text(data.valor_total);
                },
            );
        }

    </script>
    <?php
}catch (PDOException $exception){
    echo $exception;
}