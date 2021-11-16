<?php
include ("../configurações/segurança.php");
try{

    include "../configurações/conexao.php";

    if(!isset($_GET['id'])){
        die('Acesse pela listagem');
    }

    $query = $conexao->PREPARE("SELECT * FROM cliente WHERE id=:id");
    $query->bindValue(":id", $_GET['id']);

    $resultado = $query->execute();

    if($query->rowCount()==0){
        exit("Objeto não encontrado");
    }

    $linhacliente = $query->fetchObject();

}catch (PDOException $exception){
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php
include ("../configurações/bootstrap.php");
include ("../configurações/menu.php");

?>
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_pt_BR.min.js" integrity="sha256-XPVq9FOi0rZTuUUM1OBNwLj/HPADmvgTT+KSuoDqjjw=" crossorigin="anonymous"></script>

    <!---<script>
        $(document).ready(function () {
            $('.telefone').mask('(00) 0000-00009', {clearIfNotMatch:true});
            $("form").validate();
        });
    </script>--->
    <script>
        $(document).ready(function () {
            $('.cpf').mask('000.000.000-00', {clearIfNotMatch:true});
            $("form").validate();
        });

        $(document).ready(function () {
            $('.telefone').mask('(00) 0000-00009', {clearIfNotMatch:true});
            $("form").validate();
        });

    </script>
</head>
<body>

<div class="container">
    <h1> Editar - Cliente</h1>
    <form action="editar_cliente.php" method="post" class="jsonForm">
        <div class="form-group">
            <label for="id">Código</label>
            <input class="form-control" id="id" type="text" name="id" readonly value="<?php echo $linhacliente->id;?>">
        </div>

        <div class="form-group">
            <label for="nome">Nome do cliente</label>
            <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $linhacliente->nome;?>">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input class="form-control telefone" id="telefone" type="text" name="telefone" value="<?php echo $linhacliente->telefone;?>">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input class="form-control" id="cidade" type="text" name="cidade" value="<?php echo $linhacliente->cidade;?>">
        </div>

        <div class="form-group">
            <label for="uf">UF</label>
            <input class="form-control" id="uf" type="text" maxlength="2" name="uf" value="<?php echo $linhacliente->uf;?>">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" type="email" name="email" value="<?php echo $linhacliente->email;?>">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input class="form-control cpf" id="cpf" type="text" name="cpf" value="<?php echo $linhacliente->cpf;?>">
        </div>

        <div class="form-group">
            <label for="datanascimento">Data de nascimento</label>
            <input class="form-control" id="datanascimento" type="date" name="datanascimento" value="<?php echo $linhacliente->datanascimento;?>">
        </div>

        <button type="submit" class="btn btn-primary">Editar Cliente</button>
    </form>
</div>

<script>
    $(document).ready(function (){
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if(data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function(){
                            history.back();
                        }
                    });
                }else{
                    iziToast.error({
                        message: data.mensagem
                    });
                }
            },
            error:function (data){
                iziToast.error({
                    mensage:'Servidor retornou erro. '
                });
            }
        });
    });
</script>

</body>
</html>
