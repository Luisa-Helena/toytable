<?php session_start();
require "conexao.php";

$nome_turma = $_POST["nome"];
$qtd_aluno = $_POST["qtd_aluno"];
$faixa_etaria = $_POST["faixa_etaria"];
// var_dump($_SESSION); 
$professor_id = $_SESSION['professor_id'];

if ($faixa_etaria != "selected") {
    $val_nome = "SELECT COUNT(*) as count FROM tb_turma WHERE nome = ? and cod_professor = ?";

    $stmt_nome = $con->prepare($val_nome);
    $stmt_nome->bind_param("si", $nome_turma, $professor_id);
    $stmt_nome->execute();
    $result_nome = $stmt_nome->get_result();
    $row_nome = $result_nome->fetch_assoc();

    if ($row_nome['count'] > 0) {
        $_SESSION['mensagemErro'] = 'Este nome já está sendo utilizado em outra turma. Por favor, tente novamente.';
        header("Location: form_cadastra_turma.php");
        exit;
    } else {
        $comandoSql = "insert into tb_turma (cod_professor, qtd_aluno, faixa_etaria, nome)
            values ('$professor_id','$qtd_aluno','$faixa_etaria', '$nome_turma')";
        $resultado = mysqli_query($con, $comandoSql);

        if ($resultado == true)
            header('Location: tela_turma.php');
        else
            echo "Erro no cadastro";
    }
} else {
    $_SESSION['mensagemErro'] = 'Por favor selecione uma faixa-etária válida ' . $con->error;
    header("Location: form_cadastra_turma.php");
}
?>