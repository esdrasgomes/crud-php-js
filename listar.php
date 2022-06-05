<?php

// Incluir a conexao com BD
include_once "conexao.php";

// Criar a QUERY para recuperar os registros do BD
// Testar erro: WHERE usr.id = 100 
$query_usuarios = "SELECT usr.id, usr.nome, usr.email,
                    ende.logradouro, ende.numero
                    FROM usuarios AS usr 
                    LEFT JOIN enderecos AS ende ON ende.usuario_id = usr.id
                    ORDER BY usr.id DESC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();

if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){
    $dados = "<table class='table table-striped table-bordered table-hover'>";
    $dados .= "<thead>";
    $dados .= "<tr>";
    $dados .= "<th>ID</th>";
    $dados .= "<th>Nome</th>";
    $dados .= "<th>E-mail</th>";
    $dados .= "<th>Logradouro</th>";
    $dados .= "<th>Número</th>";
    $dados .= "<th>Ações</th>";
    $dados .= "</tr>";
    $dados .= "</thead>";
    $dados .= "<tbody>";
    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        extract($row_usuario);

        $dados .= "<tr>";
        $dados .= "<td>$id</td>";
        $dados .= "<td>$nome</td>";
        $dados .= "<td>$email</td>";
        $dados .= "<td>$logradouro</td>";
        $dados .= "<td>$numero</td>";
        $dados .= "<td>Visualizar Editar Apagar</td>";
        $dados .= "</tr>";
    }
    $dados .= "</tbody>";
    $dados .= "</table>";

    $retorna = ['status' => true, 'dados' => $dados];
}else{
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>"];
}

echo json_encode($retorna);
