<?php
session_start();
require "conexao.php";

if (isset($_SESSION['id_turma_sel'])) {
    $id_turma = $_SESSION['id_turma_sel'];
    
    $limite_query = "SELECT qtd_aluno FROM tb_turma WHERE id_turma='$id_turma'";
    $result = mysqli_query($con, $limite_query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $limite = $row['qtd_aluno'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cod_turma = $_POST["opcoes"];
            $nome = $_POST["nome"];
            
            // Validação nome
            $val_nome = "SELECT COUNT(*) as count FROM tb_aluno WHERE nome = ? AND cod_turma=?";
            $stmt_nome = $con->prepare($val_nome);
            $stmt_nome->bind_param("si", $nome, $cod_turma);
            $stmt_nome->execute();
            $result_nome = $stmt_nome->get_result();
            $row_nome = $result_nome->fetch_assoc();
            
            if ($row_nome['count'] > 0) {
                $_SESSION['mensagemErro'] = 'Nomes iguais não são permitidos. Por favor, tente novamente.';
                header("Location: form_cadastra_aluno.php");
                exit;
            } else {
                // Função para contar o número de alunos
                function contarAluno($con, $cod_turma) {
                    $query = "SELECT COUNT(*) as total FROM tb_aluno where cod_turma='$cod_turma'";
                    $resultado = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($resultado);
                    return $row['total'];
                }
                
                // Função para inserir um novo aluno no banco
                function cadastrarAluno($con, $nome, $cod_turma) {
                    $query = "INSERT INTO tb_aluno (nome, cod_turma) VALUES ('$nome', '$cod_turma')";
                    $sql = mysqli_query($con, $query);
                    return $sql;
                }
                
                // Verifique se o limite foi atingido
                $numeroDeAlunos = contarAluno($con, $cod_turma);
                if ($numeroDeAlunos >= $limite) {
                    $_SESSION['mensagemErro'] = 'Limite de alunos atingido. Não é possível cadastrar mais alunos nessa turma.';
                    header("Location: form_cadastra_aluno.php");
                    exit;
                } else {
                    $sql = cadastrarAluno($con, $nome, $cod_turma);
                    if ($sql) {
                        header("Location: tela_listar_aluno.php?idTurmaSel=" . $cod_turma);
                        exit;
                    } else {
                        $_SESSION['mensagemErro'] = 'Erro no cadastro';
                        header("Location: form_cadastra_aluno.php");
                        exit;
                    }
                }
            }
        } else {
            $_SESSION['mensagemErro'] = 'Por favor selecione uma turma válida ' . $con->error;
            header("Location: form_cadastra_aluno.php");
            exit;
        }
    } else {
        $_SESSION['mensagemErro'] = 'Erro na consulta: ' . mysqli_error($con);
        header("Location: form_cadastra_aluno.php");
        exit;
    }
} else {
    $_SESSION['mensagemErro'] = 'ID da turma não definido.';
    header("Location: form_cadastra_aluno.php");
    exit;
}
?>
