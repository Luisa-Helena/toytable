<?php session_start(); 
require_once"conexao.php";
$id_aluno = $_SESSION['id_aluno_sel'];

$sql = "UPDATE tb_aluno SET status = 0 WHERE id_aluno = $id_aluno";

if ($con->query($sql) === TRUE) {
    echo "Aluno desativado com sucesso.";
} else {
    echo "Erro ao desativar aluno: " . $con->error;
}
?>