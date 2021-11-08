<?php

try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse através da listagem');
    }
    $query = $conexao->prepare("SELECT orçamento.*,usuario DATE_FORMATE(orcamento.data, '%d/%m/%y') as data_formatada FROM orçamento INNER JOIN usuario ON orçamento.idusuario=usuario.id WHERE orçamento.id=:id");
    $query->bindValue(":id", $_GET['id']);
    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
    }
    $linha = $query->fetchObject();

    $queryItens=$conexao->prepare("SELECT orcamento_itens.id,veiculo.modelo,categori.nome,orcamento_itens.valor FROM orcamentos_itens INNER JOIN veiculo ON orcamento_itens.idveiculo=veiculo.id INNER JOIN categoria ON veiculo.idcategoria=categoria.id WHERE orcamento_itens.id.orcamento=:id");
    $query->bindParam(":id", $_GET['id']);
    $resultado = $query->execute();


}catch(PDOException $exception){
    echo $exception->getMessage();
}

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Orçamento n°<? echo $_GET['id'];?></h2>
            <div class="card-header">
                DADOS DO ORÇAMENTO
            </div>
        </div>
    </div>
</div>
