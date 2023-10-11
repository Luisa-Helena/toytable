<?php session_start(); 
require_once"conexao.php";
$id_professor = $_SESSION['professor_id'];

$sql = "UPDATE tb_professor SET status = 0 WHERE id_professor = $id_professor";

if ($con->query($sql) === TRUE) {
    echo "Conta desativada com sucesso.";
} else {
    echo "Erro ao desativar a conta: " . $con->error;
}
?>