<?php

    // Incluir a conexão com o banco de dados
    include_once "conexao.php";

    // Receber o id do registro
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    //$id = '';

    if (!empty($id)) {
        $query_usuario = "DELETE FROM usuarios WHERE id=:id";
        $del_usuario = $conn->prepare($query_usuario);
        $del_usuario->bindParam(':id', $id);

        if ($del_usuario->execute()) {
            $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Mensagem ao usuário: Usuário apagado com sucesso!</div>"];
        } else {
            $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Mensagem ao usuário: Erro! Usuário apagado, mas endereço não apagado com sucesso!</div>"];
        }
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Mensagem ao usuário: Erro! Nenhum usuário encontrado!</div>"];
    }

    echo json_encode($retorna);

?>