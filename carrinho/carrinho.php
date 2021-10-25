<?php
include_once ("../conexao.php");

try {

    include(__ROOT__ . '/documentacao.php');
    include(__ROOT__ . '/componentes/menu.php');

    $query = $conexao->prepare('Select atendimento_produto.quantidade as quantidade, produto.nome as produto, atendimento_produto.valorproduto as valor, idatendimento_produto as id
                                   from produto, atendimento_produto where
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
            .img_produto{
                width: 60%;
                margin: 10%;
            }
            #imagem_tabela{
                width: 15%;
            }
            #dados_tabela{
                text-align: justify;
                width: 30%;
            }
            #input_quantidade{
                width: 35%;
            }
            #botao_tabela{
                width: 20%;
            }
            table{
                align-items: center;
            }

        </style>
    </head>
    <body>
    <div class="container">
        <br><br><br><br>
        <form class="form-inline" id="search" action="" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="pesquisa" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>

        <h1> Carrinho</h1>



<table class="table table-striped">
    <?php
    while ($linha= $query->fetch()):
        ?>

        <tr>
                <td id="imagem_tabela">
                    <img src="<?php echo $foto?>" class="img_produto">
                </td>
                <td id="dados_tabela">
                    <div class="card-body">
                        <h5 class="card-title titulo"><?php echo $linha->produto; ?></h5>
                        <span class="card-text">R$ <?php echo $linha->valor; ?><b</span>
                    </div>
                </td>

                <td id="input_quantidade">
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault05">Quantidade</label>
                        <input type="number" class="form-control adiciona" id="quantidade" value="<?php echo $linha->quantidade; ?>" min="1" required>
                    </div>
                </td>
                <td id="botao_tabela">
                    <button type="button" class="btn btn-secondary acionaAdiciona" data-row-id="<?php echo $linha->id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                    </button>

                    <button type="button" class="btn btn-danger command-delete" data-row-id="<?php echo $linha->id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </td>

        </tr>


    <?php
    endwhile;
    ?>

</table>
<br>
            <div class="alert alert-warning" role="alert">
                Valor parcial do carrinho: R$ <span id="valorTotal"></span>
            </div>

            <a href="<?php echo asset("/carrinho/finalizaCarrinho.php")?>" class="btn btn-success">Finalizar compra</a>




    </div>

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
                quantidade = bntAdicionar.parent().find(".adiciona").val();
                //console.log(quantidade)
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
                        btnExcluir.parent().remove();//oculta a linha
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