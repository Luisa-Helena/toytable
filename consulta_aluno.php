<?php
session_start();
require "conexao.php";

$nomeAluno = $_GET['nomeAluno'];

$sql_id = "SELECT id_aluno, nome  FROM tb_aluno WHERE nome = '$nomeAluno'";
$result_id = $con->query($sql_id);

$response = array();

if ($result_id->num_rows > 0) {
    $row = $result_id->fetch_assoc();
    $_SESSION['id_aluno_sel'] = $row['id_aluno'];
    $_SESSION['nome_aluno_sel'] = $row['nome'];
    $response['success'] = true;
    $response['id_aluno'] = $_SESSION['id_aluno_sel'];
    $response['nome_aluno'] = $_SESSION['nome_aluno_sel'];
} else {
    $response['success'] = false;
}

echo json_encode($response);
?>
