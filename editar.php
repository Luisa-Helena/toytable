<?php session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require "conexao.php";
        
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        // $senha = $_POST["senha"];
        $id_professor = $_SESSION['professor_id'];
        
        $sql = "UPDATE tb_professor SET nome=?, cpf=?, email=?, telefone=? WHERE id_professor=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $nome, $cpf, $email, $telefone, $id_professor);
        
        if ($stmt->execute()) {
            // Atualização bem-sucedida
            $_SESSION['mensagemSucesso'] = 'Informações atualizadas com sucesso.';
        } else {
            // Erro na atualização
            $_SESSION['mensagemErro'] = 'Erro na atualização das informações.';
        }
    }
    ?>