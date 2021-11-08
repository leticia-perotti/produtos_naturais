<?php

try{
    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse atraves da listagem');
	}

    $query = $conexao->prepare("SELECT vendas.*, usuario,
	DATE_FORMAT(orcamento.data, '%d/%m/%Y') as data FROM vendas INNER
	JOIN usuario ON vendas.idusuario=usuario.id WHERE vendas.id=:id"0;
	$query->bindValue(":id", $_GET['id']);
	$resultado = $query->execute();

	$queryVeiculo = $conexao->query("SELECT * FROM produtos ORDER BY nomeproduto ASC");

	if($query->rowCount()==0){
        exit('Objeto nao encontrado');
    }

	$linha = $query->fetchObject();

}catch(){
    echo $exeption->getMessage();
}

include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<link href="../js/jquery.bootgrid.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>vendas - Itens</h2>
            <div class="card">
                <div class="card-header">
                    Dados da venda
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="usuario_id" class="col-sm-2col-form-label">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="usuario_id" value="<?php echo $linha->usuario ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data" class="col-sm-2 col-form-label">Data</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="data" value="<?php echo $linha->data_formatada ?>">
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary" data-toogle="modal"
                    data-target="#adicionarItem">
                Adicionar Item
            </button>

            <div class="modal fade" id="adicionarItem" tabindex="-1" role="dialog" aria-labelledby="adicionarItemLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adicionarItemLabel">Adicionando Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="inserir_orçamento.php" method="post" class="jsonForm">
                                    <div class="form-group row">
                                        <label for="usuario_id" class="col-sm-2col-form-label">Produto</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="produto" value="<?php echo $linha->usuario ?>" >
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="number" min="1" step="any" class="form-control" id="valor" name="valor" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="idorcamento" value="<?php echo $_GET['id']; ?>">
                                    <button type="submit" class="btn btn-sucess">Salvar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="grid-data" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="id">Código</th>
                    <th data-column-id="modelo" data-order="asc" data-sortable="true">Veiculo</th>
                    <th data-column-id="nome"  data-sortable="true">Categoria</th>
                    <th data-column-id="valor" data-sortable="true">Valor</th>
                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
                </tr>
                </thead>
            </table>
            <div class="float-right">
                <a href="exibirOrcamento.php?id=<?php echo $_GET['id']; ?>"
                   class="btn btn-sucess">Finalizar</a>
            </div>
        </div>
    </div>
</div>

<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/jquery.bootgrid.fa.js"></script>

<script>
    var grid;
    $(document).ready(function () {
        grid = $("#grid-data").bootgrid({
            ajax: true,
            rowCount: -1,
            url: "bootgridItens.php",
            post: function () {
                return{
                    id: <?php echo $_GET['id']; ?>
                };
            },
            formatters: {
                "commands": function (column, row) {
                    return "<button type=\"button\" class=\"btn btn-danger command-delete\" data-row-id=\"" +row.id + "\"><span
                class=\"fas fa-trash\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function () {
            grid.find(".command-delete").on("click", function (e) {
                iziToastExcluir($(this).data("row-id"));
            });
        });

        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: funcion(data){
            if(data.status==true){
                iziToast.success({
                    message: data.mensagem
                });
                $('.jsonForm').trigger('reset');
                grid.bootgrid("reload");
            }else{
                iziToast.error({
                    message: data.mensagem
                });
            }
            $("#adicionarItem").modal('hide');
        },
        error: funcion(data){
            iziToast.error({
                message: 'Servidor retornou erro'
            });
            $("#adicionarItem").modal('hide');
        }
    });
    });

    function excluir(id) {
        $.post(
            "excluirItens.php",
            {id: id},
            function (data) {
                if(data.status==0) {
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
