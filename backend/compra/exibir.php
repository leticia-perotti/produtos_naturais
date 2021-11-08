<?php
include ("../configurações/segurança.php");
try {
    require '../configurações/conexao.php';
    include ("../configurações/bootstrap.php");
    include ("../configurações/menu.php");

if (!isset($_GET['id'])){
die('Acesse através da listagem');
}

    $query = $conexao->prepare("			
    select fornecedor.nome as fornecedor, DATE_FORMAT(compra.data,'%d/%m/%Y') as data_formatada from compra inner 
    join fornecedor ON compra.fornecedor_idfornecedor = fornecedor.id
	where compra.id=:id");
    $query->bindValue(":id", $_GET['id']);
    $query->execute();

    $queryProdutos= $conexao->prepare("Select produto.nome as produto, 
                                                produto.valor_compra as valor,
                                                compra_has_produto.preco as valorCompra
                                                from 
                                                produto inner join compra_has_produto
                                                on produto.id = compra_has_produto.produto_idproduto
                                                where 
                                                compra_idcompras=:id");
    $queryProdutos->bindValue(":id", $_GET['id']);
    $queryProdutos->execute();


$linha = $query->fetchObject();


} catch (PDOException $exception ) {
echo $exception->getMessage();
}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Exibir</title>

</head>

<link href="../js/jquery.bootgrid.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Exibir Compra</h2>
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
        </div>
    </div>
       <br>
        <br>

        <h3>Produtos</h3>
        <table class="table table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th>Nome</th>

                <th>Valor de compra</th>
                <th>Valor desta compra</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while($linhaProdutos = $queryProdutos->fetch()){
                echo "<tr>";
                echo "<td>" . $linhaProdutos->produto."</td>";

                echo "<td>" . $linhaProdutos->valor ."</td>";
                echo "<td>" . $linhaProdutos->valorCompra ."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>


        <div class="float-right buttons">
            <a href="listagem.php" class="btn btn-primary">Ir à listagem</a>
        </div>

    </div>

    </div>
</div>


