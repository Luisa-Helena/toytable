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

    $nome_professor=$_POST["nome"];
    $cpf=$_POST["cpf"];
    $email=$_POST["email"];
    $telefone=$_POST["telefone"];
    $senha=$_POST["senha"];
    // // Criptografar a senha
    // $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    $val_email = "SELECT COUNT(*) as count FROM tb_professor WHERE email = ?";
    $val_cpf = "SELECT COUNT(*) as count FROM tb_professor WHERE cpf = ?";
    $val_tel = "SELECT COUNT(*) as count FROM tb_professor WHERE telefone = ?";
   
    
    // Validação para o email
    $stmt_email = $con->prepare($val_email);
    $stmt_email->bind_param("s", $email);
    $stmt_email->execute();
    $result_email = $stmt_email->get_result();
    $row_email = $result_email->fetch_assoc();
    
    // Validação para o CPF
    $stmt_cpf = $con->prepare($val_cpf);
    $stmt_cpf->bind_param("s", $cpf);
    $stmt_cpf->execute();
    $result_cpf = $stmt_cpf->get_result();
    $row_cpf = $result_cpf->fetch_assoc();

    // Validação para o telefone
    $stmt_tel = $con->prepare($val_tel);
    $stmt_tel->bind_param("s", $telefone);
    $stmt_tel->execute();
    $result_tel = $stmt_tel->get_result();
    $row_tel = $result_tel->fetch_assoc();
    
    
    if ($row_email['count'] > 0) {
        $_SESSION['mensagemErro'] = 'Email já está em uso. Por favor, tente novamente.';
        header("Location: form_cadastra_professor.php");
        exit;
        } else if ($row_cpf['count'] > 0) {
            $_SESSION['mensagemErro'] = 'CPF já está em uso. Por favor, tente novamente.';
            header("Location: form_cadastra_professor.php");
            exit;
                }else if ($row_tel['count'] > 0) {
                    $_SESSION['mensagemErro'] = 'O telefone já está em uso. Por favor, tente novamente.';
                    header("Location: form_cadastra_professor.php");
                    exit;
                }else if (!validaCPF($cpf)) {
                    $_SESSION['mensagemErro'] = 'CPF inválido. Por favor, insira um CPF válido.';
                    header("Location: form_cadastra_professor.php");
                    exit;
                }else{
                    $comandoSql="insert into tb_professor (nome, cpf, email, telefone, senha)
                    values ('$nome_professor','$cpf', '$email', '$telefone', '$senha' )";

                    $resultado=mysqli_query($con,$comandoSql);

                    if($resultado==true){
                    $_SESSION['user_email'] = $email;
                        header("Location: tela_principal_professor.php");
                    }else
                    echo "Erro no cadastro";
                    }
    
?>