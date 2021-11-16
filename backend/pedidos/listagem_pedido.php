<?php
include ("../configurações/segurança.php");
try {
require "../configurações/conexao.php";

include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");
?>

<link href="../js/jquery.bootgrid.css" rel="stylesheet" />

<div class="container">
    <br>
    <h1>Listagem pedidos pendentes</h1>
    <div class="row">
        <div class="col-12">
            <table id="grid-data" class="table table-condensed table-hover table striped">
                <thead>
                <tr>
                    <th data-column-id="id">ID</th>
                    <th data-column-id="cliente" data-order="desc" data-sortable="true">Cliente</th>
                    <th data-column-id="data" data-order="desc" data-sortable="true">Data</th>
                    <th data-column-id="commands" data-formatter="commands" data-sortable="false"></th>

                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/jquery.bootgrid.fa.js"></script>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg>


<script>
    var grid;
    $(document). ready(function () {
        grid=$("#grid-data").bootgrid({
            ajax: true,
            url: "bootgrid.php",
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-primary command-edit\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-eye\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-success command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-check\"></span></button>";
                }
            }
        }).on ("loaded.rs.jquery.bootgrid", function () {
            grid.find(".command-edit").on("click", function (e) {
                document.location='exibir_pedido.php?id=' + $(this).data("row-id");
            }).end().find(".command-delete").on("click", function (e)
            {
                iziToastExcluir($(this).data("row-id"));

            });

        });

    });
    function excluir(id) {
        $.post(
            "retirar_pedido.php",
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
