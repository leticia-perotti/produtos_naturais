<?php
     require "../configurações/segurança.php";
     include "../configurações/bootstrap.php";
     include "../configurações/menu.php";
     include "../configurações/conexao.php";

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Listagem Cliente</title>
</head>

<link href="../js/jquery.bootgrid.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <table id="grid-data" class="table table-condensed table-hover table striped">
                <thead>
                <h1>Listagem - Clientes</h1>
                <tr>
                    <th data-column-id="id">ID</th>
                    <th data-column-id="nome" data-order="desc" data-sortable="true">Nome</th>
                    <th data-column-id="telefone" data-order="desc" data-sortable="true">Telefone</th>
                    <th data-column-id="cidade" data-order="desc" data-sortable="true" data-visible="false">Cidade</th>
                    <th data-column-id="uf" data-order="desc" data-sortable="true" data-visible="false">Uf</th>
                    <th data-column-id="cpf" data-order="desc" data-sortable="true">CPF</th>
                    <th data-column-id="email" data-order="desc" data-sortable="true">E-mail</th>
                    <th data-column-id="data" data-order="desc" data-sortable="true">Data de nascimento</th>
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
                "commands": function (column, row) {
                    return "<button type=\"button\" class=\"btn btn-primary command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-edit\"></span></button> ";
                }
            }
        }).on ("loaded.rs.jquery.bootgrid", function () {
            grid.find(".command-edit").on("click", function (e) {
                document.location='form_editar_cliente.php?id=' + $(this).data("row-id");
            });

        });

    });

</script>
