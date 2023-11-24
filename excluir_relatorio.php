<?php
require "conexao.php";

if (isset($_POST['id-relatorio'])) {
    $id_relatorio = $_POST['id-relatorio'];
    
    $sql = "DELETE FROM tb_relatorio WHERE id_relatorio = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_relatorio);
        
        if ($stmt->execute()) {
            echo "Relatório excluído com sucesso.";
        } else {
            echo "Erro ao excluir o relatório: " . $stmt->error;
        }
    } else {
        echo "Erro na preparação da consulta: " . $con->error;
    }
} else {
    echo "Parâmetro 'id-relatorio' não foi recebido.";
}
?>
