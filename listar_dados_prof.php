<?php session_start();
require "conexao.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_senha'])) {
    $user_email = $_SESSION['user_email'];
    $user_senha = $_SESSION['user_senha'];

    $sql = "SELECT p.id_professor, p.nome, p.CPF, p.telefone, p.senha, p.email, COUNT(t.id_turma) AS quantidade_turmas 
    FROM tb_professor p
    INNER JOIN tb_turma t ON p.id_professor = t.cod_professor
    WHERE p.email = ? AND p.senha = ?
    GROUP BY p.id_professor, p.nome, p.CPF, p.telefone, p.senha, p.email;";
    $result = $con->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row["nome"];
            $cpf = $row["CPF"];
            $telefone = $row["telefone"];
            $qtd_turmas = $row["quantidade_turmas"];
        } else {
            echo "Nenhum resultado encontrado.";
        }

} else {
            header('Location: form_login_professor.php');
            exit();
        }

?>