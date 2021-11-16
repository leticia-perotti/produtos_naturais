<?php

try {

    include "../configurações/conexao.php";
    include "../configurações/canvas/canvas.php";

    $conexao->beginTransaction();

    $query = $conexao->prepare("SELECT * FROM produto WHERE nome=:nome");
    $query->bindValue(':nome',$_POST['nome']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaErro('Nome do produto já existente');
    }

        $query = $conexao->prepare("INSERT INTO produto (nome,descricao,valor,peso,quantidade,valor_compra,margem,tipo_venda) VALUES(:nome,:descricao,:valor,:peso,:quantidade,:valor_compra,:margem,:tipo_venda)");
        $query->bindValue(':nome',$_POST['nome']);
        $query->bindValue(':descricao',$_POST['descricao']);
        $query->bindValue(':valor',$_POST['valor']);
        $query->bindValue(':peso',($_POST['quantidade']?:0);
        $query->bindValue(':quantidade',($_POST['quantidade']?:0) );
        $query->bindValue(':valor_compra',$_POST['valor_compra']);
        $query->bindValue(':margem',$_POST['margem']);
        $query->bindValue(':tipo_venda',$_POST['tipo_venda']);
        $query->execute();


    $ultimoproduto=$conexao->lastInsertId();
    $categoria = $conexao->prepare("INSERT INTO categoria_produto_has_produto (categoria_produto_id,produto_idproduto) VALUES (:categoria_produto_id,:produto_idproduto) " );
     $categoria->bindValue(':categoria_produto_id',$_POST['categoria']);
     $categoria->bindValue(':produto_idproduto',$ultimoproduto);
     $categoria->execute();
    if ($query->rowCount() == 1) {

        if ($_FILES['link_foto']['error']==UPLOAD_ERR_OK){
            $nome = uniqid('produto-') . '.jpg';
            $localizacao_imagem = DIRETORIO_IMAGEM . $nome;
            if (move_uploaded_file($_FILES['link_foto']['tmp_name'], $localizacao_imagem)==false) {
                $conexao->rollBack();
                retornaErro('Erro ao manipular foto');
            }

            $img = new canvas($localizacao_imagem);

            $img->redimensiona(1000, '', 'crop');
            $img->grava($localizacao_imagem);

            $query = $conexao->prepare("INSERT INTO produto_foto (produto_id, nome_foto) VALUES(:produto_id, :nome_foto)");
            $query->bindParam(':produto_id',$ultimoproduto);
            $query->bindParam(':nome_foto',$nome);
            $query->execute();
        }

        $conexao->commit();
        retornaOK('Inserido com sucesso ');
    } else {
        $conexao->rollBack();
        retornaErro('Erro ao inserir');
    }

} catch (Exception $exception) {
    $conexao->rollBack();
    retornaErro($exception->getMessage());
}
