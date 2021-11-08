<?php
include("../configurações/segurança.php");
try{
    include "../configurações/conexao.php";

    $query=$conexao->query("SELECT * FROM fornecedor") ;

}catch (PDOException $exception){
    echo $exception->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar vendedor</title>
</head>
<body>

<?php
include("../configurações/bootstrap.php");
include("../configurações/menu.php");
?>

<div class="container">
    <form action="inserir_compra.php" method="post" class="jsonForm">
        <h1>Cadastro - Compra</h1>

        <div class="form-group">
            <label>Fornecedor</label>
            <select class="custom-select my-1 mr-sm-2" id="fornecedor" name="fornecedor" required>
                <option value="">Escolha um fornecedor</option>
                <?php while($linha = $query->fetch()): ?>

                    <option value="<?php echo $linha->id ?>"><?php echo $linha->nome; ?></option>
                <?php
                endwhile;
                ?>
            </select>
        </div>


        <div class="form-group">
            <label for="nota">Nota</label>
            <input class="form-control" id="nota" type="text" name="nota" required >
        </div>

<button type="submit" class="btn btn-primary">Cadastrar Compra</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem
                    });
                    document.location='formCadastrarItens.php?id=' +data.id;
                }else {
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
