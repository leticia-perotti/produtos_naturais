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
    #link span.badge {
        position: relative;
        left: -7px;
        top: 12px;
        font-size: 0.6em;
    }
    #link{
        float: right;
    }

</style>

<!-- Inicio do menu -->
<?php
include_once ("../conexao.php");
$index = asset('/inicial/index.php');
$listagem = asset('/listagem/listagem.php');
$pedidos = asset('/pedidos/pedidos.php');
$login = asset('/login/login.php');
$foto =asset('/fotos/logo_mini.png');
$carrinho = asset('/carrinho/carrinho.php')

?>

<nav class="nav" id="menu_bonito">
    <a class="nav-link active" href="<?php echo $index?>" id ="titulo_menu">
        <img src="<?php echo $foto?>" id="imagem_menu">
        Natural Chá</a>
    <a class="nav-link" id="link" href="<?php echo $listagem?>">Produtos</a>
    <a class="nav-link" id="link" href="<?php echo $pedidos?>">Pedidos</a>
    <a class="nav-link" id="link" href="<?php echo $login?>">Login</a>.

    <!--<button type="button" class="btn btn-secondary direita" data-toggle="tooltip" data-placement="bottom" title="Carrinho">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
    </button>

    <span class="badge badge-pill badge-success d-none">0</span>-->

    <a class="nav-link direita" id="link" onmouseover="abrirCarrinho(this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <span class="badge badge-pill badge-success d-none">0</span>
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
            <div class="modal-body">

            </div>
            <a href="<?php echo $carrinho?>" class="btn btn-success">Ir para o carrinho</a>
        </div>
    </div>
</div>

<!-- Fim  do modal do carrinho-->

<script>


    atualizaCarrinho();
    function abrirCarrinho(obj)
    {
        $("#carrinho").modal("show");
    }
    function atualizaCarrinho(){
        $.getJSON("../componentes/exibeCarrinho.php", function (data){
            var html = '';
            console.log(data.length);
            $.each(data, function(item, val){
                html += '<div class="alert alert-secondary" role="alert">';
                html += '<b font-size="large"> ' + val.produto + '</b> <br>';
                html += 'Quantidade: ' + val.quantidade + '</align>';
                html += '<div float = "right"> R$' + val.valor +'</div>';
                html += '</div>';
            });
            var $link = $("#link span.badge");
            $link.text(data.length);
            if(data.length>0){
                $link.removeClass("d-none");
            }else{
                $link.addClass("d-none");
            }

            $("#carrinho .modal-body").html(html);
        })
    }
</script>