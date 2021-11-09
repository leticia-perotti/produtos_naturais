<?php

try {

    include "../configurações/conexao.php";

    $query = $conexao->prepare("UPDATE produto SET nome=:nome,descricao=:descricao,valor=:valor,peso=:peso,quantidade=:quantidade,valor_compra=:valor_compra,margem=:margem, tipo_venda=:tipo_venda WHERE id=:id");
    $query->bindParam(':id',$_POST['id']);
    $query->bindParam(':nome',$_POST['nome']);
    $query->bindParam(':descricao',$_POST['descricao']);
    $query->bindParam(':valor',$_POST['valor']);
    $query->bindParam(':peso',$_POST['peso']);
    $query->bindParam(':quantidade',$_POST['quantidade']);
    $query->bindParam(':valor_compra',$_POST['valor_compra']);
    $query->bindParam(':margem',$_POST['margem']);
    $query->bindParam(':tipo_venda',$_POST['tipo_venda']);
    $query->execute();

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

} catch (PDOException $exception) {
    retornaErro ( $exception->getMessage() );
}