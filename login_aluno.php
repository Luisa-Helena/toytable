<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receba os dados do formulário
    $turma = $_POST['turma'];
    $aluno = $_POST['nome'];

    // Armazene os dados em variáveis de sessão
    $_SESSION['id_turma'] = $turma;
    $_SESSION['id_aluno'] = $aluno;

    // Redirecione para a página de sucesso ou faça qualquer outra ação desejada
    $_SESSION['mensagemSucesso'] = 'Dados armazenados em sessão com sucesso!';
    header('Location: tela_aluno_jogo.php');
    exit();
}
?>

