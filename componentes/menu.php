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
    #link_direita{
        color: #434546;
        flex: ;
        float: right;

    }

</style>

<nav class="nav" id="menu_bonito">
    <a class="nav-link active" href="\git\natural_cha_tcc\inicial\index.php" id ="titulo_menu">
        <img src="\git\natural_cha_tcc\fotos\logo_mini.png" id="imagem_menu">
        Natural Chá</a>
    <a class="nav-link" id="link" href="\git\natural_cha_tcc\listagem\listagem.php">Produtos</a>
    <a class="nav-link" id="link" href="\git\natural_cha_tcc\pedidos\pedidos.php">Pedidos</a>
    <a class="nav-link" id="link" href="\git\natural_cha_tcc\login\login.php">Login</a>
    <a class="nav-link" id="link_direita" href="\git\natural_cha_tcc\carrinho\carrinho.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
    </a>


</nav>