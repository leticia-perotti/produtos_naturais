<!-- Modal de Produtos -->
<div class="modal fade" id="adicionar_produto" tabindex="-1" role="dialog" aria-labelledby="adicionar_produtoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adicionar_produtoLabel">Adicionar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="inserirProduto.php" method="post" class="jsonForm">
                    <div class="form-group">
                        <label for="id_produto">Produtos</label>
                        <select class="form-control" id="id_produto" name="id_produto" required >
                            <option value="">- Selecione o produto -</option>
                            <?php
                            while($linhaProduto = $queryProdutos->fetch()){
                                echo "<option value='{$linhaProduto->id}'>{$linhaProduto->nome}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor_produto">Valor</label>
                        <input type="number" min="1" step="0.01" class="form-control" id="valor_produto" name="valor_produto" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_atendimento" value="<?php echo $_GET['id']; ?>">
                        <button type="submit" class="btn btn-success" >Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- fim do modal de produto -->


<!-- inicio do bootgrid de produto -->
<table id="grid_produto" class="table table-condensed table-hover table-striped">
    <thead>
    <tr>
        <th data-column-id="id" data-visible="false">Código</th>
        <th data-column-id="nome" data-order="desc" data-sortable="true">Produto</th>
        <th data-column-id="valor" data-sortable="true">Valor</th>
        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
    </tr>
    </thead>
</table>
<!-- fim do bootgrid de produto-->


</div>
</div>

