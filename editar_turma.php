<?php session_start();
require "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $faixa_etaria= $_POST["opcoes"];
        $qtd_aluno= $_POST["qtd_aluno"];
        $id_professor = $_SESSION["professor_id"];
        $id_turma = $_SESSION["id_turma_sel"];

        $val_nome = "SELECT COUNT(*) as count FROM tb_turma WHERE nome = ? and cod_professor = ? and id_turma!=?";
        $stmt_nome = $con->prepare($val_nome);
        $stmt_nome->bind_param("sii", $nome, $id_professor, $id_turma);
        $stmt_nome->execute();
        $result_nome = $stmt_nome->get_result();
        $row_nome = $result_nome->fetch_assoc();

        if ($row_nome['count'] > 0) {
            $_SESSION['mensagemErro'] = 'Este nome já está sendo utilizado em outra turma. Por favor, tente novamente.';
            header("Location: form_cadastra_turma.php");
            exit;
        } else {
            $sql = "UPDATE tb_turma SET nome=?, cod_professor=?, qtd_aluno=?, faixa_etaria=? WHERE id_turma=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("siisi", $nome, $id_professor, $qtd_aluno, $faixa_etaria, $id_turma);
                    
                    if ($stmt->execute()) {
                        header("Location: tela_turma.php");
                        exit;
                    } else {  
                        // Erro na atualização
                        var_dump($nome, $cod_professor, $qtd_aluno, $faixa_etaria, $id_turma);  
                        $_SESSION['mensagemErro'] = 'Erro na atualização das informações.';
                    }
    }
} 
?>