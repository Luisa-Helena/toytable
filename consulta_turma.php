<?php
session_start();
require "conexao.php";

$nomeTurma = $_GET['nomeTurma'];

$sql_id = "SELECT id_turma FROM tb_turma WHERE nome = '$nomeTurma'";
$result_id = $con->query($sql_id);

$response = array();

if ($result_id->num_rows > 0) {
    $row = $result_id->fetch_assoc();
    $_SESSION['id_turma_sel'] = $row['id_turma'];
    $response['success'] = true;
    $response['id_turma'] = $_SESSION['id_turma_sel'];
} else {
    $response['success'] = false;
}

echo json_encode($response);
?>
