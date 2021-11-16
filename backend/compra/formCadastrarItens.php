<?php

try {
    require '../configurações/conexao.php';
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

    $query = $conexao->prepare("			
    select fornecedor.nome as fornecedor, DATE_FORMAT(compra.data,'%d/%m/%Y') as data_formatada from compra inner 
    join fornecedor ON compra.fornecedor_idfornecedor = fornecedor.id
	where compra.id=:id");
    $query->bindValue(":id", $_GET['id']);
    $query->execute();

    $queryProdutos = $conexao->query("SELECT * FROM produto ");

    if ($query->rowCount()==0){
        exit("Objeto não encontrado");
    }

    $linha = $query->fetchObject();

} catch (PDOException $exception ) {
    echo $exception->getMessage();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cadastrar Itens</title>

</head>
<link href="../js/jquery.bootgrid.css" rel="stylesheet" />
<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/jquery.bootgrid.fa.js"></script>

<script src="../js/iziToast.js"></script>
<script src="../js/iziToastExcluir.js"></script>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Compra - Itens</h2>
            <div class="card">
                <div class="card-header">
                    Dados da compra
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fornecedor" class="col-sm-2 col-form-label">Fornecedor</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="fornecedor" value="<?php echo $linha->fornecedor; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data" class="col-sm-2 col-form-label">Data</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="data" value="<?php echo $linha->data_formatada; ?>">
                        </div>
                    </div>
                </div>
            </div>



                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#adicionar_produto">
                        Adicionar produto
                    </button>


                    <?php include "modalProdutos.php";?>


                    <div class="float-right">
                        <a href="listagem.php"  class="btn btn-danger">
                            Finalizar
                        </a>

</div>

<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/jquery.bootgrid.fa.js"></script>

<script>

    var grid_produto, grid_servico;
    $(document).ready(function(){

        $("#id_servico").on('change', function () {
            valor = $(this).find(':selected').data('valor');
            $("#valor_servico").val(valor);
        });

        $("#id_produto").on('change', function () {
            valorProduto = $(this).find(':selected').data('valor');
            $("#valor_produto").val(valorProduto);
        });

        $("#desconto").on("change", function () {
            final = $("#valor_total").val() - $(this).val();
            $("#valor_final").val(final);
        });

        grid_produto = $("#grid_produto").bootgrid({
            ajax: true,
            rowCount: -1,
            url: "bootgridProdutos.php",
            post: function ()
            {
                return {
                    id: <?php echo $_GET['id']; ?>
                };
            },
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-trash\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            grid_produto.find(".command-delete").on("click", function(e)
            {
                iziToastExcluir2($(this).data("row-id"));
            });
        });



        $('.jsonForm').ajaxForm({
            dataType:  'json',
            success:   function(data){
                if (data.status==true){
                    iziToast.success({
                        message: data.mensagem
                    });
                    $('.jsonForm').trigger('reset');

                    grid_produto.bootgrid("reload");

                }else{
                    iziToast.error({
                        message: data.mensagem
                    });
                    grid_produto.bootgrid("reload");
                }
                $("#adicionarItem").modal('hide');
            },
            error: function (data) {
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
                $("#adicionarItem").modal('hide');
            }
        });

    });

    function excluir2(id){
        $.post(
            "excluirProduto.php",
            { id: id },
            function( data ) {
                if (data.status==0){
                    iziToast.error({
                        message: data.mensagem
                    });
                }else{
                    iziToast.success({
                        message: data.mensagem
                    });
                    grid_produto.bootgrid("reload");


                }
            },
            "json"
        );
    }

</script>
