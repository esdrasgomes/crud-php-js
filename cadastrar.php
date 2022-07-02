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
        // Cadastrar no BD dentro da tabela 'usuarios'
        $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $cad_usuario = $conn -> prepare($query_usuario);
        $cad_usuario -> bindParam(':nome', $dados['nome']);
        $cad_usuario -> bindParam(':email', $dados['email']);
        $cad_usuario -> execute();

        // Verificar se cadastrou usuário
        if ($cad_usuario->rowCount()) {
            // Recuperar o último id inserido
            $id_usuario = $conn -> lastInsertId();

            // Cadastrar no BD dentro da tabela 'enderecos'
            $query_endereco = "INSERT INTO enderecos (logradouro, numero, usuario_id) VALUES (:logradouro, :numero, :usuario_id)";
            $cad_endereco = $conn -> prepare($query_endereco);
            $cad_endereco -> bindParam(':logradouro', $dados['logradouro']);
            $cad_endereco -> bindParam(':numero', $dados['numero']);
            $cad_endereco -> bindParam(':usuario_id', $id_usuario);
            $cad_endereco -> execute();

            // Verificar se cadastrou endereço
            if ($cad_endereco->rowCount()) {
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