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
                <h1>Listagem - Fornecedores</h1>
                <tr>
                    <th data-column-id="id">Código</th>
                    <th data-column-id="cnpj" data-order="desc" data-sortable="true">CNPJ </th>
                    <th data-column-id="nome" data-order="desc" data-sortable="true">Nome</th>
                    <th data-column-id="endereco" data-order="desc" data-sortable="true">Endereco</th>
                    <th data-column-id="transportadora" data-order="desc" data-sortable="true">Transportadora</th>
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
                    return "<button type=\"button\" class=\"btn btn-primary command-edit\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-edit\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-trash\"></span></button>";
                }
            }
        }).on ("loaded.rs.jquery.bootgrid", function () {
            grid.find(".command-edit").on("click", function (e) {
                
                document.location='form_editar_fornecedor.php?id=' + $(this).data("row-id");
            }).end().find(".command-delete").on("click", function (e)
            {
                iziToastExcluir($(this).data("row-id"));

            });

        });

    });
    function excluir(id) {
        $.post(
            "excluir_fornecedor.php",
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
