<?php session_start();
require "conexao.php";
if (isset($_SESSION['id_turma_sel'])) {
    $id_turma = $_SESSION['id_turma_sel'];
    
    $limite_query = "SELECT qtd_aluno FROM tb_turma WHERE id_turma='$id_turma'";
    $result = mysqli_query($con, $limite_query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $limite = $row['qtd_aluno'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nome = $_POST["nome"];
        $cod_turma = $_POST["opcoes"];
        $id_aluno = $_SESSION["id_aluno_sel"];

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
            function editarAluno($con, $nome, $cod_turma) {
                $sql_editar = "UPDATE tb_aluno SET nome=?, cod_turma=? WHERE id_aluno=?";
                $sql = mysqli_query($con, $sql_editar);
                return $sql;
            }
            
            // Verifique se o limite foi atingido
            $numeroDeAlunos = contarAluno($con, $cod_turma);
            if ($numeroDeAlunos >= $limite) {
                $_SESSION['mensagemErro'] = 'Limite de alunos atingido. Não é possível cadastrar mais alunos nessa turma.';
                header("Location: form_cadastra_aluno.php");
                exit;
            } else {
                $sql = editarAluno($con, $nome, $cod_turma);
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
    }
}
}
            
            //     if ($stmt->execute()) {
            //         header("Location: tela_listar_aluno.php?idTurmaSel=" . $cod_turma);
            //         exit;
            //     } else {
            //         // Erro na atualização
            //         $_SESSION['mensagemErro'] = 'Erro na atualização das informações.';
            //     }
            // }
?>