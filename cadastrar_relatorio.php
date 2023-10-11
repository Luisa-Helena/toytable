<?php session_start();
require "conexao.php";
$descricao=$_POST["campo_texto"];
$cod_turma=$_SESSION['id_turma_sel'];
$cod_aluno=$_SESSION["id_aluno_sel"];
$cod_professor=$_SESSION["professor_id"];
$cod_fase=1;
$data = $_POST['data']; 
$titulo = $_POST['titulo'];


$sql="INSERT INTO tb_relatorio (cod_professor, cod_fase, descricao, data, cod_aluno, titulo)
      values ('$cod_professor','$cod_fase','$descricao','$data','$cod_aluno', '$titulo')";
$resultado = mysqli_query($con, $sql);

if ($resultado == true) {
    header("Location: tela_listar_aluno.php?idTurmaSel=" . $_SESSION['id_turma_sel']);

} else {
    echo "Erro no cadastro";
}
?>  