<?php

    // Incluir a conexão com o banco de dados
    include_once "conexao.php";

    // Receber o id
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Acessa o IF quando a variável ID possuir valor
    if(!empty($id)) {

        $retorna = ['status' => false, 'dados' => $id];

    } else {

        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!"];

    }
    echo json_encode($retorna);
?>