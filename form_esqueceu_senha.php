<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Esqueci minha senha </title>
      
    
    <link rel="stylesheet" href="CSS/resposividade.css">
    <link rel="stylesheet" href="CSS/geral.css">
    <link rel="stylesheet" href="CSS/caixa_texto_form_MENOR.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/ver_senha.css">
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
    body {
    font-family: 'Graduate', sans-serif;
}
</style>

</head>
<body>
<div class="header"> 
<div class="toytable"> TOYTABLE </div>
<div class="titulo"> ESQUECI MINHA SENHA </div>
</div>
<br><br><br><br><br><br>
<div class="footer">Email para contato: toytable@gmail.com</div>
<div class="form-container">
    <form action="email.php" method="POST">

      <div class="form-group">        
        <label for="email">EMAIL:</label><br>
        <input type="text" id="email" name="email" required autocomplete="off">
      </div></br></br><br><br>


      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="ENVIAR" >
      <input type="Button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()"></br>
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="ESQUECI A SENHA"></br>
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'index.php';">
   
    
</body>
</html>