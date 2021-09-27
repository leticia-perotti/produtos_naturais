<?php

echo "Obrigado por comprar na natural chá";

setcookie('carrinho', null, -1, '/');
unset($_SESSION["cliente_autorizado"]);
unset($_SESSION["cliente_id"]);
unset($_SESSION["cliente_nome"]);