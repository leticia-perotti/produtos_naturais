<?php

try {
    include_once("../conexao.php");

    $confereCarrinho = $conexao->prepare('Select * from atendimento where idatendimento=:atendimento');
    $confereCarrinho->bindParam(":atendimento", $_COOKIE['carrinho']);
    $confereCarrinho->execute();

    $linha= $confereCarrinho->fetch();

    if ($linha-> cliente_idclientes == null){
        header("Location:".asset('/login/login.php'));
        exit();
    }

    include(__ROOT__ . '/documentacao.php');
    include(__ROOT__ . '/componentes/menu.php');

    $foto =asset('/fotos/logo_mini.png');
?>
    <!doctype html>
    <html lang="en">
<head>
    <title>Natural Chá</title>
    <link rel="icon" href="<?php $foto?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
    <body>
    <div class="container">
        <br><br><br>

        <h1> Finalizar compra</h1>

        <form method="post" action="envioFinalCarrinho.php" class="jsonForm">
            <div class="form-group">
                <label for="nome">Nome de quem retirá</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="hora_prevista">Hora prevista para a retirada</label>
                <input type="time" class="form-control" value="hora_prevista" name="hora_prevista" id="hora_prevista" required>
            </div>
            <div class="form-group">
                <label for="forma_pagamento">Forma de pagamento</label>
                <select class="form-control" name="forma_pagamento" id="forma_pagamento" required>
                    <option value="">Selecione uma opção</option>
                    <option value="dinheiro">Dinheiro</option>
                    <option value="cartao_credito">Cartão de crédito</option>
                    <option value="cartao_debito">Cartão de débito</option>
                    <option value="pix">Pix</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="outros_forma_pagamento" id="outros_forma_pagamento" placeholder="Outra forma de pagamento">
            </div>

            <div class="form-group">
                <label for="observacao">Observação</label>
                <input type="text" class="form-control observacao" id="observacao" name="observacao" placeholder="Se será retirado outro dia, dentre outros">
            </div>

            <button type="submit" class="btn btn-success">Finalizar compra</button>
        </form>

    </div>
    </body>
<script>
    $('#forma_pagamento').on('change', function(){
        var formaPagamento = $(this).val();
        if (formaPagamento == 'outro'){
            $("#outros_forma_pagamento").attr('type', 'text');
        }else{
            $("#outros_forma_pagamento").attr('type', 'hidden').val('');
        }
    });

    $(document).ready(function () {
        $('.jsonForm').ajaxForm ({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function () {
                        window.location = '<?php echo asset("inicial/mensagemFinal.php"); ?>';
                    }

                    });


                }else {
                    iziToast.error({
                        message: data.mensagem
                    });
                }

            },
            error: function(data){
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
            }
        });
    });
</script>
    <?php
}catch (PDOException $exception) {
    retornaErro($exception->getMessage());
}
