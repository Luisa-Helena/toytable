<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Esqueci minha senha </title>
      
    
    <link rel="stylesheet" href="CSS/resposividade.css">
    <link rel="stylesheet" href="CSS/caixa_texto_form_MENOR.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css"> 
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
<img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
<div class="titulo"> ESQUECI MINHA SENHA </div>
</div>
<br><br><br><br><br><br>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
<div class="form-container">
    <form method="POST">

      <div class="form-group">        
        <label for="codigo">CÓDIGO:</label><br>
        <input type="text" id="codigo" name="codigo" required autocomplete="off">
      </div></br></br></br></br><br>
      
      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="ENVIAR" >
      <input type="Button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()"></br>
      <!-- <input type="Button" style="width: 398px;height:10;text-align: center;" value="ESQUECI A SENHA"></br> -->
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'home.php';">
   
    
</body>
</html>


<!-- VERIFICANDO SE O TOKEN DIGITADO ESTÁ CORRETO -->

<?php 
require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $token_digitado = $_POST['codigo'];
    // echo"$token_digitado";
    date_default_timezone_set('America/Sao_Paulo');
    $currentTimestamp = date('Y-m-d H:i:s');
    $sql = "SELECT user_id FROM tb_token WHERE token = ? AND expiration_time > ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $token_digitado, $currentTimestamp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $_SESSION['user_id'] = $user_id;

        echo 'Token válido!';
        header("Location: form_nova_senha.php");
        
        $sql_delete = "DELETE FROM tb_token WHERE token = ?";
        $stmt_delete = $con->prepare($sql_delete);
        $stmt_delete->bind_param("s", $token_digitado);
        $stmt_delete->execute();
    } else{
        echo 'Token inválido ou expirado!';
    }
}
?>