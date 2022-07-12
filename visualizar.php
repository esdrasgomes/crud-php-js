<?php

    // Incluir a conexão com o banco de dados
    include_once "conexao.php";

    // Receber o id
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Acessa o IF quando a variável ID possuir valor
    if(!empty($id)) {

    $query_usuario = "SELECT usr.id, usr.nome, usr.email,
                             ende.logradouro, ende.numero
                      FROM usuarios AS usr 
                      LEFT JOIN enderecos AS ende ON ende.usuario_id = usr.id 
                      WHERE usr.id = :id LIMIT 1";

        $result_usuario = $conn->prepare($query_usuario);     
        $result_usuario->bindParam(':id', $id);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $retorna = ['status' => true, 'dados' => $row_usuario];
        } else {
            $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!"];
        }

    } else {

        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!"];

    }
    echo json_encode($retorna);
?>