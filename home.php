<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home </title>
    <link rel="stylesheet" href="CSS/caixa_texto_form.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/botao_entrar.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/toytable.css"> 
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">    
    <link rel="stylesheet" href="CSS/pagina_inicial.css">

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
    <div class="entrar">
        <input type="button" value="Entrar" id="botaoEntrar" onClick="window.location.href='form_seleciona_perfil.php';">
    </div>
    <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
    <div class="toytable" onclick="window.location.href = 'home.php'"> TOYTABLE </div>
<!-- <div class="titulo">CADASTRO</div> -->
</div>
<div class="caixa1"></div>
<div class="logo">
<img src="CSS/imagens/logo (1).png" alt="Logo" width="200" height="200">

</div>

<div class="linha"></div>
<div class="caixa2">
</div>
<div class="linha"></div>
<div class="caixa3"></div>
<div class="nos"> <img src="CSS/imagens/nos.jpg" alt="Foto do grupo" width="175" height="175"> </div>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
   <br><br><br><br><br><br>
 
   
<script src="js/scripts.js" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>
</html>