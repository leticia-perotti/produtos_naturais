<?php


try{
    require_once "../conexao.php";




    $vizualizar= $conexao->prepare("SELECT id, nome, valor, descricao FROM produto where id=:id");
    $vizualizar-> bindValue(':id', $_GET['id']);
    $vizualizar-> execute();

    $linha = $vizualizar->fetch();
    $linha->valor = formatar_valor($linha->valor);

    echo json_encode($linha);
    exit;

    if($vizualizar->rowCount()==0){
        exit ("Erro ao carregar o produto");
    }

    $linha= $vizualizar->fetchObject();

}catch (PDOException $exception){
    echo $exception->getMessage();
    echo "Deu erro!";
}
?>
<!-- Modal de adicionar produto -->
<style>
    .modal-header {
        background-color: blanchedalmond;
    }
    .modal-title{
        font-family: 'Comfortaa', cursive;
        font-family: 'Pattaya', sans-serif;
        font-size: x-large;
    }
    #imagem_modal{
        width: 45%;
        float :left;
    }
    #imagem_modal:hover{
        opacity: 80%;
    }
    #lado{
        float: right;

    }
    #botao{
        background-color: blanchedalmond;
        color: black;
        border-style: none;
        float: right;
    }
    label{
        color: #5d5d5d;
    }

</style>

<div class="modal fade" id="vizualizar_produto" tabindex="-1" role="dialog" aria-labelledby="vizualizar_produtoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vizualizar_produtoLabel"><?php echo $linha->nome; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adicionar.php">
            <div class="modal-body">

                    <img src="../fotos/camomila.jpg" title="Camomila" id="imagem_modal">
                    <div class="form-group row" id="lado">
                        <label class="col-sm-2 col-form-label"><?php echo $linha->valor; ?></label>
                        <br>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="R$ <?php echo $linha->valor; ?>">
                        </div>
                    </div>
                    <div class="form-group row" id="lado">
                        <label class="col-sm-2 col-form-label"><?php echo $linha->descricao; ?></label>
                        <br>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="<?php echo $linha->descricao; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quantidade </label>
                        <div class="col-sm-10">
                            <input type="text" id="exampleFormControlInput1" class="form-control-plaintext">
                        </div>
                    </div>
                </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light" id="botao" >Adicionar</button>

                    </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- fim do modal de servico -->


