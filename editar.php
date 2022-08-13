<?php

    // Incluir a conexão com o banco de dados
    include_once "conexao.php";

    // Receber os dados
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Validar formulário básico
    if(empty($dados['nome'])) {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o nome!</div>"];
    } else if(empty($dados['email'])) {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o e-mail!</div>"];
    } else if(empty($dados['logradouro'])) {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o logradouro!</div>"];
    } else if(empty($dados['numero'])) {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o número!</div>"];
    } else {
        // Editar no BD dentro da tabela 'usuarios'
        $query_usuario = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id";
        $edit_usuario = $conn -> prepare($query_usuario);
        $edit_usuario -> bindParam(':nome', $dados['nome']);
        $edit_usuario -> bindParam(':email', $dados['email']);
        $edit_usuario -> bindParam(':id', $dados['id']);

        // Verificar se editou usuário
        if ($edit_usuario->execute()) {

            // Editar no BD dentro da tabela 'enderecos'
            $query_endereco = "UPDATE enderecos SET logradouro=:logradouro, numero=:numero WHERE usuario_id=:usuario_id";
            $edit_usuario = $conn -> prepare($query_endereco);
            $edit_usuario -> bindParam(':logradouro', $dados['logradouro']);
            $edit_usuario -> bindParam(':numero', $dados['numero']);
            $edit_usuario -> bindParam(':usuario_id', $dados['id']);

            // Verificar se editou endereço
            if ($edit_usuario->execute()) {
                $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
            } else {
                $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não foi possível cadastrar o usuário!"];
            }
        } else {
            $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não foi possível cadastrar o usuário!"];
        }

    }

    echo json_encode($retorna);

?>