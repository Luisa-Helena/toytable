<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
require "conexao.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

// PEGANDO O EMAIL QUE FOI DIGITADO NO FORMS
$_SESSION['email'] = $_POST['email'];
$email = $_SESSION['email'];
$sql = "SELECT email FROM tb_professor where email='$email' LIMIT 1";
$resultado = $con->query($sql);

// PEGANDO O ID DESSE USUARIO (EMAIL)
$sql_id = "SELECT id_professor FROM tb_professor WHERE email = ? LIMIT 1";
$stmt_id = $con->prepare($sql_id);
$stmt_id->bind_param("s", $email);


if ($stmt_id->execute()) {
    $result_id = $stmt_id->get_result();
    $row = $result_id->fetch_assoc();

    // INSERINDO O TOKEN NA TABELA TB_TOKEN 
    if ($row) {
        $user_id = $row['id_professor'];
        $token = substr(md5(uniqid(rand(), true)), 0, 6);
		date_default_timezone_set('America/Sao_Paulo');
        $expiration_time = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        $sql_token = "INSERT INTO tb_token (user_id, token, expiration_time) VALUES (?, ?, ?)";
        $stmt_token = $con->prepare($sql_token);
        $stmt_token->bind_param("iss", $user_id, $token, $expiration_time,);

        if ($stmt_token->execute()) {
            $mail = new PHPMailer();
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'toytable2023@gmail.com';
                $mail->Password = 'yfvnaoqjjsyyixbx';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('toytable2023@gmail.com');
                $mail->addAddress($_POST['email']);
                $mail->addReplyTo('toytable2023@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = 'Recuperação de Senha - ToyTable';
                $mail->Body = '
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Recuperação de Senha - ToyTable</title>
                </head>
                <body>
                    <p>Olá,</p>
                    
                    <p>Você está recebendo este e-mail porque solicitou a recuperação de senha da sua conta na ToyTable.</p>
                    
                    <p>Para redefinir sua senha, utilize o seguinte código:</p>
                    
                    <p style="font-size: 24px; font-weight: bold;">'.$token.'</p>
                    
                    <p>Este código é válido por 15 minutos a partir do momento do envio deste e-mail.</p>
                    
                    <p>Se você não solicitou a recuperação de senha, pode ignorar este e-mail com segurança.</p>
                    
                    <p>Atenciosamente,<br>Equipe ToyTable</p>
                </body>
                </html>
                ';
                $mail->AltBody = 'Recuperação de senha. Digite o código: '.$token; // Para clientes de e-mail que não suportam HTML


                if($mail->send()) {
                    echo 'Email enviado com sucesso';
                    header("Location: form_inserir_codigo.php");
                } else {
                    echo 'Email não enviado';
                }
            } catch (Exception $e) {
                echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
            }
        } else {
            echo 'Erro ao inserir o token: ' . $stmt_token->error;
        }
    } else {
        echo 'Usuário não encontrado com o email fornecido.';
    }
} else {
    echo 'Erro ao executar a consulta: ' . $stmt_id->error;
}
?>