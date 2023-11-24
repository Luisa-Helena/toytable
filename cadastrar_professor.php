<?php session_start();
require "conexao.php";

function validaCPF($cpf) {
    // Remove caracteres não numéricos do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF possui 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += $cpf[$i] * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : (11 - $resto);

    // Calcula o segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += $cpf[$i] * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : (11 - $resto);

    // Verifica se os dígitos verificadores são válidos
    if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
        return false;
    }

    return true;
}
$nome_professor = $_POST["nome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$senha = $_POST['senha'];
$confirma_senha = $_POST['confirma_senha'];

// Realize as validações individualmente e forneça mensagens de erro apropriadas para cada caso
if (validaCPF($cpf) && $senha == $confirma_senha) {
    $val_status = "SELECT COUNT(*) as count FROM tb_professor WHERE email = ? and status = 0";
    $val_email = "SELECT COUNT(*) as count FROM tb_professor WHERE email = ?";
    $val_cpf = "SELECT COUNT(*) as count FROM tb_professor WHERE cpf = ?";
    $val_tel = "SELECT COUNT(*) as count FROM tb_professor WHERE telefone = ?";
    
    // (execute as consultas e recupere os resultados aqui)

    if ($row_status['count'] == 0 && $row_email['count'] == 0 && $row_cpf['count'] == 0 && $row_tel['count'] == 0) {
        // Inserção de dados no banco de dados
        $stmt = $con->prepare("INSERT INTO tb_professor (nome, cpf, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome_professor, $cpf, $email, $telefone, $senha);
        if ($stmt->execute()) {
            $_SESSION['user_email'] = $email;
            header("Location: tela_principal_professor.php");
        } else {
            $_SESSION['mensagemErro'] = "Erro ao cadastrar. Tente novamente.";
            header("Location: form_cadastra_professor.php");
        }
    } else {
        $_SESSION['mensagemErro'] = 'Email, CPF ou telefone já estão em uso ou status inválido. Por favor, tente novamente.';
        header("Location: form_cadastra_professor.php");
    }
} else {
    $_SESSION['mensagemErro'] = 'CPF inválido ou as senhas não coincidem. Por favor, insira informações válidas.';
    header("Location: form_cadastra_professor.php");
}
?>
