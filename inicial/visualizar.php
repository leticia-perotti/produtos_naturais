
<?php
try{
require_once "../conexao.php";

$vizualizar= $conexao->prepare("SELECT id, nome, valor, descricao FROM produto where id=:id");
$vizualizar-> bindValue(':id', $_GET['id']);
$vizualizar-> execute();

$linha = $vizualizar->fetch();
$linha->valor = $linha->valor;
$linha->valor_formatado = formatar_valor($linha->valor);

echo json_encode($linha);
exit;

if($vizualizar->rowCount()==0){
exit ("Erro ao carregar o produto");
}

$linha= $vizualizar->fetchObject();

}catch (PDOException $exception){
retornaErro("Erro ao inserir: " . $exception->getMessage());
}
?>