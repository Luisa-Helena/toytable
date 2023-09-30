<?php
session_start();

if (isset($_SESSION['reset_token']) && isset($_SESSION['user_id'])) {
    // O token e o ID do usuário existem nas sessões
    $token = $_SESSION['reset_token'];
    $usuario_id = $_SESSION['user_id'];

    // Verificar se o token recebido pela URL é válido
    if (isset($_GET['token'])) {
        $token_recebido = $_GET['token'];

        // Comparar o token recebido com o token armazenado nas sessões
        if ($token_recebido !== $token) {
            echo "Token inválido. Verifique o link enviado por e-mail.";
            exit();
        }
    } else {
        echo "Token não encontrado na URL.";
        exit();
    }

    // Restante do código para a página de redefinição de senha ...

} else {
    // Token e/ou ID do usuário não estão nas sessões ou são inválidos
    echo "Token inválido ou expirado. Verifique o link enviado por e-mail.";
}
?>