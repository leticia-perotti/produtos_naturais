<?php
//include ("../configurações/bootstrap.php");
?>
<?php
session_start();

    include "conexao.php";

    $senha = sha1($_POST['senha']);
    $query = $conexao->prepare("SELECT * FROM vendedores WHERE usuario=:usuario AND senha=:senha");
    $query->bindValue(':usuario', $_POST['usuario']);
    $query->bindValue(':senha', $senha);
    $query->execute();

    if ($query->rowCount() == 1) {
        $linha = $query->fetch();

        $_SESSION['idvendedor'] = $linha->id;
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['autorizado'] = true;
        $_SESSION['autorizado'] = true;
        retornaOk('Autorizado com sucesso!');

        header("Location: ../vendedores/listagem_vendedor.php");

    } else {
    retornaErro('Erro ao autenticar');
}




