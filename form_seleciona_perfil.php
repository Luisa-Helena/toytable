<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções de login</title>

   <!-- <link rel="stylesheet" href="CSS/caixa_texto_form.css">-->
    <link rel="stylesheet" href="CSS/caixa_texto_form_MENOR.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">    

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
    <div class="titulo">OPÇÕES DE LOGIN</div>
  </div>
  <div class="footer">Email para contato: toytable@gmail.com</div>
  </br></br></br></br></br></br>
  <div class="form-container">
    <main>
    <div class="form-group"></br>
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="PROFESSOR" onclick="window.location.href = 'form_login_professor.php';"></br><br>
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="ALUNO" onclick="window.location.href = 'form_login_aluno.php';"></br></br></br></br></br></br><br>
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'index.php';">
      
</body>
</html>