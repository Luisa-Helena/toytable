<?php session_start(); 

if (isset($_POST['setSessionButton'])) {
    $_SESSION['titulo'] = 'ESQUECI MINHA SENHA';
    header("Location: form_esqueceu_senha.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Professor</title>

    <link rel="stylesheet" href="CSS/caixa_texto_form.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">   
    <link rel="stylesheet" href="CSS/link.css">     

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

    <body>

     <!-- Script para remover a mensagem de erro após alguns segundos -->
     <script>
        // Função para remover a mensagem de erro após um período de tempo
        function removerMensagemErro() {
            var mensagemErro = document.querySelector('.mensagem-erro');
            if (mensagemErro) {
                mensagemErro.style.display = 'none';
            }
        }
        setTimeout(removerMensagemErro, 2500);
    </script>


<!--FUNÇÃO VER SENHA-->
<script>
        function verSenha() {
            var senhaInput = $('#senha');
            var tipo = senhaInput.attr('type');
            var imagemIcone = $('.ver-senha-icon');
            
            if (tipo === 'password') {
                senhaInput.attr('type', 'text');
                imagemIcone.attr('src', 'senha_visivell.png');
                imagemIcone.attr('alt', 'Senha Visível');
            } else {
                senhaInput.attr('type', 'password');
                imagemIcone.attr('src', 'senha_oculta.png');
                imagemIcone.attr('alt', 'Senha Oculta');
            }
        }
    </script>
<!--FIM DA FUNÇÃO VER SENHA-->


<!-- FUNÇÃO PARA LIMPAR OS CAMPOS DO FORMULARIO QUANDO A PAGINA FOI CARREGADA -->
<!-- <script>
        function limparCampos() {
            var campos = document.querySelectorAll('input');
            for (var i = 0; i < campos.length; i++) {
                campos[i].value = '';
            }
        }
        window.onload = limparCampos;
    </script> -->

    </head>
<body>
<!--Função de limpar-->
<script>
        function limparCampos() {
            document.getElementById('email').value = '';
            document.getElementById('senha').value = '';
        }
</script>

<div class="header"> 
<img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
<div class="titulo"> LOGIN </div>
</div>
<br><br><br><br><br><br>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
<div class="form-container">
    <form action="login_professor.php" method="POST">

      <div class="form-group">        
        <label for="email">EMAIL:</label><br>
        <input type="text" id="email" name="email" required autocomplete="off">
      </div></br>

      <div class="form-group">
        <label for="senha">SENHA:</label><br>
        <input type="password" id="senha" name="senha" required  autocomplete="off">
      </div>
    <div class="input-imagem">
    <img class="ver-senha-icon" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha()">
    </div>
    <div class="cadastro">
        <label for="linkLabel" id="linkLabel">Não tenho uma conta</label>
    </div>

    <script>
        document.getElementById("linkLabel").addEventListener("click", function() {
        window.location.href = "form_cadastra_professor.php";
    });
    </script>
    </br></br></br></br>
      

      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="ENTRAR" >
      </form>    
      <input type="Button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()"></br>
      <form method="post">
        <input type="submit" name="setSessionButton" style="width: 398px;height:10;text-align: center;" value="ESQUECI A SENHA"></br>
            </form>
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onClick="window.location.href = 'home.php';">
      <!-- Exibir a mensagem de erro caso exista -->
      <?php
      
        if (isset($_SESSION['mensagemErro']) && !empty($_SESSION['mensagemErro'])) {
          echo '<div class="mensagem-erro">' . $_SESSION['mensagemErro'] . '</div>';
          $_SESSION['mensagemErro'] = ''; // Limpa a mensagem de erro da sessão após exibi-la
        }
        ?>

  </div>
  <script src="js/scripts.js" type="text/javascript"> </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>