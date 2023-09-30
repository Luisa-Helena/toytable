<?php
session_start();

function validarLogin($email, $senha) {
    require "conexao.php"; 

    $query = "SELECT * FROM tb_professor WHERE email='$email' AND senha='$senha'";
    $resultado = $con->query($query);

    if ($resultado->num_rows === 1) {
        return true; 
    } else {
        return false; 
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $idProfessor = validarLogin($email, $senha);

    if ($idProfessor !== false) { // Compare com !== false
        $_SESSION['user_email'] = $email;
        header("Location: tela_principal_professor.php");
        exit;
    } else {
        $_SESSION['mensagemErro'] = 'Email ou senha inválida. Por favor, tente novamente.';
        header("Location: form_login_professor.php");
        exit;
    }
}
?>
