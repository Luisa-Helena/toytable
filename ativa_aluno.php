<?php
session_start();
require_once "conexao.php";

if (isset($_POST['id'])) {
    $idAlunoSel = $_POST['id']; // Acesse o ID enviado por POST

    $sql = "UPDATE tb_aluno SET status = 1 WHERE id_aluno = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idAlunoSel);

    if ($stmt->execute()) {
        echo "Aluno ativado com sucesso.";
    } else {
        echo "Erro ao ativar o aluno: " . $stmt->error;
    }
}
?>
