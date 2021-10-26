<?php
include "../conexao.php";

unset( $_SESSION['cliente_autorizado'] );
unset( $_SESSION['cliente_id'] );
unset( $_SESSION['cliente_nome'] );

setcookie('carrinho', null, -1, '/');
session_destroy();


header("Location:" . asset("/inicial/index.php"));
