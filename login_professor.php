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
    require "conexao.php"; 
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $idProfessor = validarLogin($email, $senha);

    if ($idProfessor !== false) { // Compare com !== false
        $_SESSION['user_email'] = $email;
        $user_email = $_SESSION["user_email"];
            $sql_id = "SELECT id_professor from tb_professor where email='$user_email'";
            $result_id = $con->query($sql_id);
        
            if ($result_id && $result_id->num_rows > 0) {
                $row = $result_id->fetch_assoc();
                $_SESSION["professor_id"] = $row["id_professor"];      
            }
        header("Location: tela_principal_professor.php");
        exit;
    } else {
        $_SESSION['mensagemErro'] = 'Email ou senha inválida. Por favor, tente novamente.';
        header("Location: form_login_professor.php");
        exit;
    }
}
?>
