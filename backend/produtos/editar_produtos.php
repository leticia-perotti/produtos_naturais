<?php

try {

    include "../configurações/conexao.php";
    include "../configurações/canvas/canvas.php";

    $conexao->beginTransaction();

    $query = $conexao->prepare("UPDATE produto SET nome=:nome,descricao=:descricao,valor=:valor,peso=:peso,quantidade=:quantidade,valor_compra=:valor_compra,margem=:margem, tipo_venda=:tipo_venda WHERE id=:id");
    $query->bindParam(':id',$_POST['id']);
    $query->bindParam(':nome',$_POST['nome']);
    $query->bindParam(':descricao',$_POST['descricao']);
    $query->bindParam(':valor',$_POST['valor']);
    $query->bindParam(':peso',$_POST['peso']);
    $query->bindValue(':quantidade',($_POST['quantidade']?:0) );
    $query->bindParam(':valor_compra',$_POST['valor_compra']);
    $query->bindParam(':margem',$_POST['margem']);
    $query->bindParam(':tipo_venda',$_POST['tipo_venda']);
    $query->execute();

    if(isset($_POST['alterar']) && $_POST['alterar'] == 'excluir_foto'){
        $buscar= $conexao->prepare("Select nome_foto from produto_foto where produto_id=:id");
        $buscar->bindValue(":id", $_POST['id']);
        $buscar->execute();

        if($buscar->rowCount()!=0) {
            $excluir = $conexao->prepare("Delete from produto_foto where produto_id=:id ");
            $excluir->bindValue(":id", $_POST['id']);
            $excluir->execute();

            $linhaExcluir = $buscar->fetchObject();

            $localizacao_imagem = DIRETORIO_IMAGEM . $linhaExcluir->nome_foto;

            if (!unlink($localizacao_imagem)) {
                throw new Exception('Erro ao apagar foto');
            } else {
                retornaOK("Foto exluida com sucesso");
            }
        }else{
            retornaErro("Nenhuma foto para ser excluída");
        }

    }elseif (isset($_POST['alterar']) && $_POST['alterar'] == 'trocar_foto'){
        $buscar= $conexao->prepare("Select nome_foto from produto_foto where produto_id=:id");
        $buscar->bindValue(":id", $_POST['id']);
        $buscar->execute();

        if($buscar->rowCount()!=0){
            $linhaExcluir=$buscar->fetchObject();

            $localizacao_imagem = DIRETORIO_IMAGEM . $linhaExcluir->nome_foto;

            //if($buscar->rowCount()!=0){
            $excluir=$conexao->prepare("Delete from produto_foto where produto_id=:id ");
            $excluir->bindValue(":id", $_POST['id']);
            $excluir->execute();

            if (!unlink($localizacao_imagem)) {
                throw new Exception('Erro ao apagar foto');
            }
        }


        if (isset($_FILES['link_foto']) && $_FILES['link_foto']['error'] == UPLOAD_ERR_OK) {
            $nome = uniqid('produto-') . '.jpg';
            $localizacao_imagem = DIRETORIO_IMAGEM . $nome;
            if (move_uploaded_file($_FILES['link_foto']['tmp_name'], $localizacao_imagem) == false) {
                $conexao->rollBack();
                retornaErro('Erro ao manipular foto');
            }

            $img = new canvas($localizacao_imagem);

            $img->redimensiona(1000, '', 'crop');
            $img->grava($localizacao_imagem);

            $queryFoto = $conexao->prepare("INSERT INTO produto_foto (produto_id, nome_foto) VALUES(:produto_id, :nome_foto)");
            $queryFoto->bindParam(':produto_id', $_POST['id']);
            $queryFoto->bindParam(':nome_foto', $nome);
            $queryFoto->execute();
        }

        $conexao->commit();

        if($queryFoto->rowCount()!=0){
            retornaOK("Foto alterada com sucesso");
        }else{
            retornaErro("Erro ao alterar foto");
        }
    }


} catch (Exception $exception) {
    $conexao->rollBack();
    retornaErro ( $exception->getMessage() );
}