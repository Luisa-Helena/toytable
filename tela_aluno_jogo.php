<?php session_start(); 
require_once "conexao.php";

$id_aluno = $_SESSION['id_aluno'];
$id_turma = $_SESSION['id_turma'];

$sql = "SELECT nome FROM tb_aluno WHERE id_aluno='$id_aluno'";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_aluno = $row["nome"];
}

$sql_turma = "SELECT nome FROM tb_turma WHERE id_turma='$id_turma'";
$result_turma = $con->query($sql);

if ($result_turma && $result_turma->num_rows > 0) {
    $row_turma = $result_turma->fetch_assoc();
    $nome_turma = $row_turma["nome"];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title> Vamos Brincar </title>
      
    
    <link rel="stylesheet" href="CSS/resposividade.css">
    <link rel="stylesheet" href="CSS/geral.css">
    <link rel="stylesheet" href="CSS/tela_principal_aluno.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css"> 
    <link rel="stylesheet" href="CSS/botao_sair.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    *{
        margin: 0;
        padding: 0;
    }
    @font-face {
    font-family: 'Graduate';
    src: url('Graduate-Regular.ttf') format('truetype');
    /* Adicione outros formatos de fonte, se necessário */
}
@font-face {
    font-family: 'Modak';
    src: url('Modak-Regular.ttf') format('truetype');
}
    body {
    font-family: 'Graduate';
}
</style>

</head>
<body>
<div class="header"> 
<div class="sair">
            <input type="button" value="Sair" id="botaoSair">
        </div>

        <script>
            document.getElementById('botaoSair').addEventListener('click', function() {

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'encerrar_sessao.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert('Você será redirecionado para a página inicial.');
                        window.location.href = 'home.php';
                    }
                };
                xhr.send();
            });
        </script>
  <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'">
<div class="titulo"> VAMOS BRINCAR </div>
</div>
<br><br><br><br><br><br>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
<div class="form-container">
<div class="dados">
        <div class="informacoes">
            <?php
            
            echo "<div>Aluno: $nome_aluno</div>";

            echo "<div>Turma: $nome_turma</div>";
            ?>
        </div>
</div>
</div>
<div class="fundo">
    <div class="banner-jogo">
        <img src='CSS/imagens/capa-jogo1.png' class='capa-jogo'>
        <div class="botao1">
            <input type="button" value="JOGAR" onclick="window.location.href = 'form_edita_senha.php';">
        </div>
    </div>
    <div class="banner-jogo">
        <img src='CSS/imagens/capa-jogo1.png' class='capa-jogo'>
        <div class="botao2">
            <input type="button" value="JOGAR" onclick="window.location.href = 'form_edita_senha.php';">
        </div>
    </div>
    <div class="banner-jogo">
        <img src='CSS/imagens/capa-jogo1.png' class='capa-jogo'>
        <div class="botao3">
            <input type="button" value="JOGAR" onclick="window.location.href = 'form_edita_senha.php';">
        </div>
    </div>
</div>
</body>
</html>