<?php session_start();
require "conexao.php";

$id_relatorio = $_SESSION['id-relatorio'];
var_dump($id_relatorio);
$descricao=$_POST["campo_texto"];
$cod_aluno=$_SESSION["id_aluno_sel"];
$titulo = $_POST['titulo'];

$val_titulo = "SELECT COUNT(*) as count FROM tb_relatorio WHERE titulo = ? AND cod_aluno = ? AND id_relatorio != ?";

// Validação para titulo
$stmt_titulo = $con->prepare($val_titulo);
$stmt_titulo->bind_param("sii", $titulo, $cod_aluno, $id_relatorio);
$stmt_titulo->execute();
$result_titulo = $stmt_titulo->get_result();
$row_titulo = $result_titulo->fetch_assoc();

if ($row_titulo['count'] > 0) {
    $_SESSION['mensagemErro'] = 'Parece que esse título já foi atribuido para esse aluno';
    header("Location: tela_editar_relatorio.php");
}else{
    $sql="UPDATE tb_relatorio SET descricao=?, titulo=? WHERE id_relatorio=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssi", $descricao, $titulo, $id_relatorio);
 
    if ($stmt->execute()) {
        header("Location: tela_lista_relatorio.php");
        exit;
    } else {
        $_SESSION['mensagemErro'] = 'Erro na atualização das informações.';
    }
}
?>