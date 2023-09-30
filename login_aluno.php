<?php
session_start();

// Função para validar o login
function validarLogin($nome,$id_turma)
{
    require "conexao.php"; 

    $query = "SELECT * FROM tb_aluno WHERE nome='$nome' AND cod_turma='$id_turma'";
    $resultado = $con->query($query);

    if ($resultado->num_rows ===1) {
        return true; 
    } else {
        return false; 
    }
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pegando os dados do formulário
    $nome = $_POST["nome"];
    $turma = $_POST["turma"];
    $queryturma = "SELECT id_turma from tb_turma WHERE nome='$turma'";
    $resultadoturma = $con->query($queryturma);
    if ($resultadoturma) {
        $row = $resultadoturma->fetch_assoc();
        if ($row) {
            $id_turma = $row["id_turma"];
        } else {
            $_SESSION['mensagemErro'] = 'Turma não encontrada';
            header("Location: login_aluno.php");
            exit;
        }
    } else {
        $_SESSION['mensagemErro'] = 'Erro na consulta da turma: ' . $con->error;
        header("Location: login_aluno.php");
        exit;
    }
   

    // Chama a função validarLogin
    $loginValido = validarLogin($nome,$id_turma);

    if ($loginValido) {
        header("Location: form_tela_aluno.php");
        exit;
    } else {
        $_SESSION['mensagemErro'] = 'Nome de aluno inválido';
        header("Location: login_aluno.php");
        exit;
    }
}
?>

