<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Professor </title>
    <link rel="stylesheet" href="CSS/caixa_texto_form_MAIOR.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/toytable.css"> 
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">    
    <link rel="stylesheet" href="CSS/resposividade.css">

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
            var SenhaInput = $('#senha');
            var tipoSenha = SenhaInput.attr('type');
            var imagemIcone = $('.ver-senha-icon-nova');
            
            if (tipoSenha === 'password') {
                SenhaInput.attr('type', 'text');
                imagemIcone.attr('src', 'senha_visivell_nova.png');
                imagemIcone.attr('alt', 'Senha Visível');
            } else {
                SenhaInput.attr('type', 'password');
                imagemIcone.attr('src', 'senha_oculta_nova.png');
                imagemIcone.attr('alt', 'Senha Oculta');
            }
        }

        function verSenha2() {
            var confirmaSenhaInput = $('#confirma_senha');
            var tipoConfirmaSenha = confirmaSenhaInput.attr('type');
            var imagemIcone = $('.ver-senha-icon-confirma');
            
            if (tipoConfirmaSenha === 'password') {
                confirmaSenhaInput.attr('type', 'text');
                imagemIcone.attr('src', 'senha_visivell.png');
                imagemIcone.attr('alt', 'Senha Visível');
            } else {
                confirmaSenhaInput.attr('type', 'password');
                imagemIcone.attr('src', 'senha_oculta.png');
                imagemIcone.attr('alt', 'Senha Oculta');
            }
        }

    </script>

<!--FIM DA FUNÇÃO VER SENHA-->


<!--Função de limpar-->
<script>
        function limparCampos() {
            document.getElementById('nome').value = '';
            document.getElementById('cpf').value = '';
            document.getElementById('email').value = '';
            document.getElementById('telefone').value = '';
            document.getElementById('senha').value = '';
            // Limpar outros campos do formulário aqui, se houver
        }
    </script>

<div class="header">
<img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
<div class="titulo">CADASTRO</div>
</div>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
   <br><br><br><br><br><br>
  <div class="form-container">
       
    <form action="cadastrar_professor.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required autocomplete="off">
      </div>
      <div class="form-group">        
            <label for="senha">SENHA:</label><br>
            <input type="password" id="senha" name="senha" required  autocomplete="off">
            <div class="input-imagem1-cadastrar">
            <img class="ver-senha-icon-nova" src="senha_oculta_nova.png" alt="Senha Oculta" onclick="verSenha()">
        </div><br><br>

        <div class="form-group">        
            <label for="confirma_senha">CONFIRMAR SENHA:</label><br>
            <input type="password" id="confirma_senha" name="confirma_senha" required  autocomplete="off">
            <div class="input-imagem2-cadastrar">
            <img class="ver-senha-icon-confirma" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha2()">
        </div></br></br><br>

      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="CADASTRAR">
      <input type="button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()">
      <input type="button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'home.php';">
      
      <!-- Exibir a mensagem de erro caso exista -->
   <?php
        if (isset($_SESSION['mensagemErro']) && !empty($_SESSION['mensagemErro'])) {
          echo '<div class="mensagem-erro">' . $_SESSION['mensagemErro'] . '</div>';
          $_SESSION['mensagemErro'] = ''; // Limpa a mensagem de erro da sessão após exibi-la
        }
        ?>
  </div>
    </form>
  
  </div>
   
<script src="js/scripts.js" type="text/javascript"> </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>
</html>