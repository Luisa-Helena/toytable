<?php session_start();
require "conexao.php";
$descricao=$_POST["campo_texto"];
$cod_turma=$_SESSION['id_turma_sel'];
$cod_aluno=$_SESSION["id_aluno_sel"];
$cod_professor=$_SESSION["professor_id"];
$cod_fase=1;
$titulo = $_POST['titulo'];

$val_titulo = "SELECT COUNT(*) as count FROM tb_relatorio WHERE titulo = ? AND cod_aluno = ?";

// Validação para titulo
$stmt_titulo = $con->prepare($val_titulo);
$stmt_titulo->bind_param("si", $titulo, $cod_aluno);
$stmt_titulo->execute();
$result_titulo = $stmt_titulo->get_result();
$row_titulo = $result_titulo->fetch_assoc();

if ($row_titulo['count'] > 0) {
    $_SESSION['mensagemErro'] = 'Parece que esse título já foi atribuido para esse aluno';
    header("Location: tela_relatorio_aluno.php");
}else{
    $sql="INSERT INTO tb_relatorio (cod_professor, cod_fase, descricao, data, cod_aluno, titulo)
    values ('$cod_professor','$cod_fase','$descricao', SYSDATE(),'$cod_aluno', '$titulo')";
    $resultado = mysqli_query($con, $sql);

    if ($resultado == true) {
        header("Location: tela_lista_relatorio.php");
    
    } else {
        echo "Erro no cadastro";
    }
}

?>  