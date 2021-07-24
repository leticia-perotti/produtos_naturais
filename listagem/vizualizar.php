
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
                <h5 class="modal-title" id="vizualizar_produtoLabel">Camomila</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <img src="../fotos/camomila.jpg" title="Camomila" id="imagem_modal">
                    <div class="form-group row" id="lado">
                        <label class="col-sm-2 col-form-label">Valor</label>
                        <br>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="R$ 3.00">
                        </div>
                    </div>
                    <div class="form-group row" id="lado">
                        <label class="col-sm-2 col-form-label">Descrição</label>
                        <br>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="Pacote com 50g">
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

            </div>
        </div>
    </div>
</div>
<!-- fim do modal de servico -->


