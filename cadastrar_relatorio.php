<?php session_start();
require "conexao.php";
$descricao=$_POST["campo_texto"];
$cod_turma=$_SESSION['id_turma_sel'];
$cod_aluno=$_SESSION["id_aluno_sel"];
$cod_professor=$_SESSION["professor_id"];
$cod_fase=1;
$data = '2023-12-23'; 

$sql="INSERT INTO tb_relatorio (cod_professor, cod_fase, descricao, data, cod_aluno)
      values ('$cod_professor','$cod_fase','$descricao','$data','$cod_aluno')";
$resultado = mysqli_query($con, $sql);

if ($resultado == true) {
    header('Location: tela_turma.php');
} else {
    echo "Erro no cadastro";
}
?>  