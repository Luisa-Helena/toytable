<?php
require_once "conexao.php";

$turmaSelecionada = $_POST["turma"];

$sql = "SELECT id_aluno, nome FROM tb_aluno WHERE cod_turma = $turmaSelecionada";
$result = $con->query($sql);

// Construa as opções da combobox de alunos
$options = "<option value=''>Selecione o aluno</option>";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='" . $row['id_aluno'] . "'>" . $row['nome'] . "</option>";
}
// Retorne as opções para a combobox de alunos
echo $options;
?>
