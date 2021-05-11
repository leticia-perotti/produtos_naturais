<?php


try{
    include "../documentacao.php";
    include "../menu.php";
    include "../conexao.php";

    try {
        $produto= $conexao-> query("Select *from produto");

    }catch (PDOException $exception ) {
        echo $exception->getMessage();
    }


    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>Natural Chá | Produtos</title>


        <link href="../../../js/natural_cha_tcc/jquery.bootgrid.css" rel="stylesheet">

        <script src="../../../natural_cha_tcc/js/iziToast.js"></script>
        <script src="../../../natural_cha_tcc/js/iziToastExcluir.js"></script>
        <link href="boot5.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>


    <body>
    <div class="container" id="corpo">

        <br>
        <br>
        <br>
    <h1> Produtos</h1>
        <div class="row">
            <div class="col-12">

                <?php
                 while ($linhaProduto=$produto->fetchObject()){
                    echo "
<hr>
<div class=\"card\" id= \"box\" style=\"width: 18rem;\">
  <img src=\"...\" class=\"card-img-top\" alt=\"...\">
  <div class=\"card-body\">
    <h5 class=\"card-title\" data-column-id=\"nome\">{$linhaProduto->nome}</h5>
    <p class=\"card-text\">R$ {$linhaProduto->valor}</p>
       
    <div class=\"d-grid gap-2\">
    <a href=\"#\" class=\"btn btn-light\" type='button' style=\"width:100%;height:10%\" ><img src='../fotos/carrinho.png' width='30'></a>
    </div>
  </div>
 </div>
 </hr>";
                }
                ?>

                <script src="../../../natural_cha_tcc/js/jquery.bootgrid.js"></script>
                <script src="../../../natural_cha_tcc/js/jquery.bootgrid.fa.js"></script>



                </ul>
            </div>
        </div>
    </div>
    </div>




    </body>

    <script>
        var grid;
        $(document). ready(function () {
            grid= $("#grid-data"). bootgrid({
                ajax: true,
                url:"bootgrid.php",
                formatters: {
                    "commands": function(column, row)
                    {
                        return "<button type=\"button\" class=\"btn btn-success command-exibir\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-eye\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-primary command-edit\" data-row-id=\"" + row.id   + "\"><span class=\"fas fa-edit\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-trash\"></span></button>";
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function()
            {
                grid.find(".command-exibir").on("click", function(e)
                {
                    // alert($(this).data("row-id"));
                    document.location = 'exibir.php?id= '+ $(this).data("row-id");
                }).end().find(".command-edit").on("click", function(e)
                {
                    document.location = 'formEditar.php?id= '+ $(this).data("row-id");
                }).end().find(".command-delete").on("click", function(e)
                {
                    iziToastExcluir($(this).data("row-id"));
                });
            });

        });

        function excluir(id) {
            $.post(
                "excluir.php",
                {id: id},
                function (data) {
                    if(data.status==0){
                        iziToast.error({
                            message: data.mensagem
                        });
                    }else{
                        iziToast.success({
                            message: data.mensagem
                        });
                        grid.bootgrid("reload");
                    }

                },
                "json"

            );

        }

    </script>



    </body>
    </html>


    <?php

}catch (PDOException $exception) {
    echo $exception->getMessage();
    echo '<br>';
    echo "Deu erro!";

}