<?php

include_once ("../conexao.php");

try{

include(__ROOT__ . '/documentacao.php');
include(__ROOT__ . '/componentes/menu.php');

    if (isset($_GET["pesquisa"]) && $_GET["pesquisa"]!=''){
        $pesquisa = "%" . $_GET["pesquisa"] . "%";

        $query = $conexao->prepare('Select DATE_FORMAT(atendimento.data_carrinho, "%M %d %Y") as data, atendimento.status as status, atendimento.idatendimento as id
                                             from atendimento
                                             where atendimento.status!=1');
        $query->bindParam(":pesquisa", $pesquisa);
        $query->execute();

    }else {
        $query = $conexao->query('Select DATE_FORMAT(atendimento.data_carrinho, "%d/%m/%Y") as data, atendimento.status as status, atendimento.idatendimento as id
                                             from  atendimento                                             
                                             where atendimento.status!=1 order by data');
    }


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Natural Chá | Pedidos</title>
    <style>
        #imagem{
            width: 75px;

        }
        #texto{
            color: black;
            display: inline-block;
            font-size: x-large;
        }
        #qnt{
            color: #434546;
            display: inline-block;
            font-size: small;
        }
        #produto{
            padding: 10px;
            border-width: thin;
            border-style: solid;
            border-color: #adb5bd;
            border-radius: 10px;
            margin-top: 5px;
        }
    </style>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

</head>


<body>
<div class="container">
    <br>
    <br>
    <br><br>
    <h1>Pedidos</h1>
    <hr>

    <?php
    while ($linha=$query->fetch()):
    ?>
    <div class="alert alert-secondary" role="alert">
    <?php
        if($linha->status == 2):

        ?>

    <h3><?php echo $linha->data; ?></h3>
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Pedido pendente
            </div>
        </div>
            <?php endIf;
            if($linha->status == 3):
        ?>
                <h3><?php echo $linha->data; ?></h3>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            Pedido retirado
            </div>
        </div>
    <?php
    endIf;
    ?>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#vizualizar_pedido" data-id="<?php echo $linha->id; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"/>
            </svg>
        </button>
        </div>
        <?php
        endwhile;
        ?>

</div>

    <div class="modal fade" id="vizualizar_pedido" tabindex="-1" role="dialog" aria-labelledby="vizualizar_pedido" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header cabecalho">
                    <h5 class="modal-title titulo_do_modal" id="vizualizar_pedidoLabel"></h5>
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
                            <label class="col-sm-2 col-form-label">Descrição: </label>
                            <br>
                            <div class="col-sm-10">
                                <span id="descricao_modal"><?php echo $linha->descricao; ?></span>
                            </div>
                            <br>
                        </div>

                        <div class="input-group">
                            <label for="quantidade">Quantidade:</label><br>
                            <input type="number" class="form-control" aria-describedby="basic-addon2" id="qnt" name="qnt" step="2" value="1" min="1" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                                <button class="btn btn-outline-secondary" type="button">-</button>
                            </div>
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
    <script>
        $('#vizualizar_pedido').on('show.bs.modal', function (event) {
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
            })


        })

        $('#vizualizar_pedido').on('hide.bs.modal', function (event) {
            var modal = $(this)
            modal.find('#valor_modal').text('')
            modal.find('.modal-title').text('')
            modal.find('#descricao_modal').text('')
            modal.find('#qnt').attr('min', '1').attr('step', 'any');
            modal.find('#id_modal').text('')

        })
    </script>


    <?php
}catch (PDOException $exception){
    echo $exception->getMessage();
    echo "Deu erro";

}