<?php session_start(); 
require_once"conexao.php";
$id_aluno = $_SESSION['id_aluno_sel'];

$sql = "UPDATE tb_aluno SET ativo = 0 WHERE id_aluno = $id_aluno";

if ($con->query($sql) === TRUE) {
    echo "Conta desativada com sucesso.";
} else {
    echo "Erro ao desativar a conta: " . $conexao->error;
}
?>