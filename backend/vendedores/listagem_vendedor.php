<?php

try {
require "../configurações/conexao.php";
$_SESSION['vendedor'] = 'vendedor dasdda';

$resultado = $conexao->query("SELECT * FROM vendedores ORDER BY id ASC");

?>

<?php

include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");
?>
<header>
    <title>Listagem Vendedores</title>
</header>

<link href="../js/jquery.bootgrid.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <table id="grid-data" class="table table-condensed table-hover table striped">
                <thead>
                <h1>Listagem - Vendedores</h1>
                <tr>
                    <th data-column-id="id">ID</th>
                    <th data-column-id="usuario" data-order="desc" data-sortable="true">Usuario</th>
                    <th data-column-id="email" data-order="desc" data-sortable="true">E-mail</th>
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
                document.location='form_editar_vendedor.php?id=' + $(this).data("row-id");
            }).end().find(".command-delete").on("click", function (e)
            {
                iziToastExcluir($(this).data("row-id"));

            });

        });

    });
    function excluir(id) {
        $.post(
            "excluir_vendedor.php",
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
