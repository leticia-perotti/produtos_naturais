
<?php
try {
    require "../configurações/conexao.php";

?>

<?php

include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");
?>

<link href="../js/jquery.bootgrid.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <table id="grid-data" class="table table-condensed table-hover table striped">
                <thead>
                <h1>Listagem - Produtos</h1>
                <tr>
                    <th data-column-id="id" data-visible="false">Código</th>
                    <th data-column-id="nome" data-order="desc" data-sortable="true">Nome </th>
                    <th data-column-id="descricao" data-order="desc" data-sortable="true" data-visible="false">Descrição</th>
                    <th data-column-id="valor" data-order="desc" data-sortable="true">Valor</th>
                    <th data-column-id="peso" data-order="desc" data-sortable="true" data-visible="false">Peso</th>
                    <th data-column-id="quantidade" data-order="desc" data-sortable="true" data-visible="false">Quatidade</th>
                    <th data-column-id="valor_compra" data-order="desc" data-sortable="true">Valor da compra</th>
                    <th data-column-id="margem" data-order="desc" data-sortable="true">Margem</th>
                    <th data-column-id="commands" data-formatter="commands" data-sortable="false"></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/jquery.bootgrid.fa.js"></script>


<script>
    var grid;
    $(document). ready(function () {
        grid=$("#grid-data").bootgrid({
            ajax: true,
            url: "bootgrid.php",
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-warning command-exibir\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-eye\"></span></button> "+
                    "<button type=\"button\" class=\"btn btn-primary command-edit\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-edit\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-success command-ver\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-history\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-trash\"></span></button> ";
                }
            }
        }).on ("loaded.rs.jquery.bootgrid", function () {
            grid.find(".command-edit").on("click", function (e) {

                document.location='form_editar_produtos.php?id=' + $(this).data("row-id");
            }).end().find(".command-delete").on("click", function (e)
            {
                iziToastExcluir($(this).data("row-id"));

            });
            grid.find(".command-exibir").on("click", function (e) {

                document.location='exibir_produtos.php?id=' + $(this).data("row-id");
            });
            grid.find(".command-ver").on("click", function (e) {

                document.location='historico_produtos.php?id=' + $(this).data("row-id");
            });

        });

    });
    function excluir(id) {
        $.post(
            "excluir_produtos.php",
            {id: id},
            function (data) {
                if (data.status == 0) {
                    iziToast.error({
                        message: data.mensagem
                    });
                } else {
                    iziToast.success({
                        message: data.mensagem
                    });
                    grid.bootgrid("reload");
                }
            },
        "json"
    );
    }
    <?php
    }catch(PDOException $exception){
        echo $exception->getMessage();
    }
    ?>
</script>
