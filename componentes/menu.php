<style>
    #menu_bonito{
        position: fixed;
        color: black;
        height: 10%;
        width: 100%;
        font-size: larger;
        background-color: white;
        font-family: Arial;
        padding: 10px;
        text-decoration: none;
        align-content: space-around;
        align-items: center;
        box-shadow: 3px 5px 3px 3px rgba(0, 0, 0, 0.3);
        z-index: 10;
    }
    #titulo_menu {
        font-size: x-large;
        color: black;
    }
    #imagem_menu{
        border-radius: 50%;
        width: 30px;
    }
    #link{
        color: #434546;
        flex: ;
    }
    .direita{
        float: right;
    }

</style>

<!-- Inicio do menu -->

<nav class="nav" id="menu_bonito">
    <a class="nav-link active" href="/inicial/index.php" id ="titulo_menu">
        <img src="/fotos/logo_mini.png" id="imagem_menu">
        Natural Chá</a>
    <a class="nav-link" id="link" href="">Produtos</a>
    <a class="nav-link" id="link" href="/pedidos/pedidos.php">Pedidos</a>
    <a class="nav-link" id="link" href="/login/login.php">Login</a>
    <a class="nav-link direita" id="link" onmouseover="abrirCarrinho(this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
    </a>
</nav>

<!-- fim do menu -->

<!-- Modal do carrinho -->

<div class="modal fade" id="carrinho" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carrinhoLabel">Carrinho</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <br>
            <div class="form-group row" id="lado">
                <label class="col-sm-2 col-form-label">Produto: </label>
                <br>
                <div class="col-sm-10">
                    <span id="produto_carrinho"><?php echo $linha->produto; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fim  do modal do carrinho-->

<script>

    $('#carrinho').on('show.bs.modal', function (event) {
        var mOver = $(event.relatedTarget) // Button that triggered the modal
        var id = mOver.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        $.getJSON("../componentes/exibeCarrinho.php?id=" + id, function (data){
            modal.find('#valor_carrinho').val(data.valor)
            modal.find('#produto_carrinho').text(data.produto)
            modal.find('#quantidade').val(data.quantidade);
         })
    })

    $('#carrinho').on('hide.bs.modal', function (event) {
        var modal = $(this)
        modal.find('#valor_carrinho').val('')
        modal.find('#produto_carrinho').text('')
        modal.find('#quantidade').attr('min', '1').attr('step', '0.1').val(data.quantidade);

    })

    function abrirCarrinho(obj)
    {
        $("#carrinho").modal({
                show: true
            });
    }
</script>