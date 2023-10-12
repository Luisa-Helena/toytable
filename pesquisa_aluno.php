<?php session_start();  
require_once 'conexao.php';

$searchText = $_GET['searchText'];
$cod_turma = $_SESSION['id_turma_sel'];

$sql = 'SELECT nome FROM tb_aluno WHERE cod_turma = ? and nome LIKE "%' . $searchText . '%"  ';
$stmt = $con->prepare($sql);
$stmt->bind_param('i', $cod_turma);
$stmt->execute();
$result = $stmt->get_result();

$response_aluno = [];

// Adiciona os resultados da pesquisa ao array
if ($result->num_rows === 0) {
    // Não há resultados
} else {
    while ($row = $result->fetch_assoc()) {
        $response_aluno[] = $row;
    }
}

// Envia os resultados da pesquisa como uma resposta JSON
header('Content-Type: application/json');
echo json_encode($response_aluno);

?>
