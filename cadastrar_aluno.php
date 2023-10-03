<?php session_start();
require "conexao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //pegando os dados do formulário 
    $cod_turma = $_POST["opcoes"];
    $nome = $_POST["nome"];

    //mandando os dados para o banco

    if ($cod_turma != "selected") {
        $val_nome = "SELECT COUNT(*) as count FROM tb_aluno WHERE nome = ?";

        $stmt_nome = $con->prepare($val_nome);
        $stmt_nome->bind_param("s", $nome);
        $stmt_nome->execute();
        $result_nome = $stmt_nome->get_result();
        $row_nome = $result_nome->fetch_assoc();

        if ($row_nome['count'] > 0) {
            $_SESSION['mensagemErro'] = 'Nomes iguais não são permitidos. Por favor, tente novamente.';
            header("Location: form_cadastra_aluno.php");
            exit;
        } else {
            $comandoSql = "insert into tb_aluno (cod_turma, nome)
        values ('$cod_turma','$nome')";

            $resultado = mysqli_query($con, $comandoSql);
        }
        if ($resultado == true)
            echo "Cadastrado com sucesso";
        else
            echo "Erro no cadastro";
    } else {
        $_SESSION['mensagemErro'] = 'Por favor selecione uma turma válida ' . $con->error;
        header("Location: form_cadastra_aluno.php");
        exit;
    }
}
?>