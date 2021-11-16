<?php

include("../configurações/segurança.php");

try{
    include "../configurações/conexao.php";

    $queryproduto = $conexao->query("SELECT * FROM produto ORDER BY nome ASC");
    $querycategoria = $conexao->query("SELECT * FROM categoria_produto ORDER BY nome ASC");

}catch (PDOException $exception){
    echo $exception->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>

</head>
<body>

<?php
include("../configurações/bootstrap.php");
include("../configurações/menu.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_pt_BR.min.js" integrity="sha256-XPVq9FOi0rZTuUUM1OBNwLj/HPADmvgTT+KSuoDqjjw=" crossorigin="anonymous"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('.valor').mask('99,99', {clearIfNotMatch:true});
        $("form").validate();
    });
</script>
<div class="container">
    <form action="inserir_produtos.php" method="post" class="jsonForm" enctype="multipart/form-data">
        <h1>Cadastro - Produto</h1>


        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input class="form-control" id="nome" type="text" name="nome" required >
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input class="form-control" id="descricao" type="text" name="descricao" required>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input class="form-control" id="valor" type="number" min="0" step="0,01" name="valor" required >
        </div>

        <div class="form-group">
            <label for="peso">Peso</label>
            <input class="form-control" id="peso" min="0" step="0,001" type="number" name="peso">
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" id="quantidade" type="number" min="1" step="1" name="quantidade">
        </div>

        <div class="form-group">
            <label for="valor_compra">Valor compra</label>
            <input class="form-control" id="valor_compra" type="number" min="0" step="0,01" name="valor_compra" required>
        </div>

        <div class="form-group">
            <label for="margem">Margem</label>
            <input class="form-control" id="margem" type="number" min="0" name="margem" required >
        </div>

        <div class="form-group">
            <label for="tipo_venda">Tipo de venda</label>
            <input class="form-control" id="tipo_venda" type="text" name="tipo_venda" required >
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <select class="custom-select my-1 mr-sm-2" id="categoria" name="categoria" required>
                <option value="">Escolha uma categoria</option>
                <?php while($linha = $querycategoria->fetch()): ?>

                    <option value="<?php echo $linha->id ?>"><?php echo $linha->nome; ?></option>
                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Imagem</label>
             <input class="form-control" id="link_foto" type="file" name="link_foto" required >
        </div>





<button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $(' .jsonForm ').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true){
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function(){
                            document.location="listagem_produto.php";
                            history.back();
                        }
                    });
                    $('.jsonForm').trigger('reset');
                }else{
                    iziToast.error({
                        message: data.mensagem
                    });
                }
            },
            error: function (data) {
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
            }
        });
    });
</script>
</body>
</html>
