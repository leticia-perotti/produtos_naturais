<?php
include ("../configurações/segurança.php");

require "../configurações/conexao.php";
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Listagem</title>

</head>

<link href="../js/jquery.bootgrid.css" rel="stylesheet">

<script src="../js/iziToast.js"></script>
<script src="../js/iziToastExcluir.js"></script>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Compra - Listagem</h2>
            <table id="grid-data" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="id" >Código</th>
                    <th data-column-id="fornecedor" data-order="desc" data-sortable="true">Fornecedor</th>
                    <th data-column-id="data_formatada" data-order="desc" data-sortable="true">Data</th>
                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
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
    $(document).ready(function(){
        grid = $("#grid-data").bootgrid({
            ajax: true,
            url: "bootgrid.php",
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-warning command-exibir\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-eye\"></span></button> ";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            grid.find(".command-exibir").on("click", function(e)
            {
                document.location = 'exibirAtendimento.php?id=' + $(this).data("row-id");
            });
        });
    });



</script>
