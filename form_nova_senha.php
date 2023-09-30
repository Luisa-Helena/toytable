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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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


<!--FUNÇÃO VER SENHA-->
<script>
        function verSenha() {
            var novaSenhaInput = $('#nova_senha');
            var tipoNovaSenha = novaSenhaInput.attr('type');
            var imagemIcone = $('.ver-senha-icon-nova');
            
            if (tipoNovaSenha === 'password') {
                novaSenhaInput.attr('type', 'text');
                imagemIcone.attr('src', 'senha_visivell_nova.png');
                imagemIcone.attr('alt', 'Senha Visível');
            } else {
                novaSenhaInput.attr('type', 'password');
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

<!-- FUNÇÃO PARA LIMPAR OS CAMPOS DO FORMULARIO QUANDO A PAGINA FOI CARREGADA
<script>
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
<div class="header"> 
<div class="toytable"> TOYTABLE </div>
<div class="titulo"> REDEFINIR SENHA </div>
</div>
<br><br><br><br><br><br>
<div class="footer">Email para contato: toytable@gmail.com</div>

<div class="form-container">
    <form method="POST">
        <div class="form-group">        
            <label for="nova_senha">NOVA SENHA:</label><br>
            <input type="password" id="nova_senha" name="nova_senha" required  autocomplete="off">
            <div class="input-imagem1">
            <img class="ver-senha-icon-nova" src="senha_oculta_nova.png" alt="Senha Oculta" onclick="verSenha()">
        </div><br><br>

        <div class="form-group">        
            <label for="confirma_senha">CONFIRMAR SENHA:</label><br>
            <input type="password" id="confirma_senha" name="confirma_senha" required  autocomplete="off">
            <div class="input-imagem2">
            <img class="ver-senha-icon-confirma" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha2()">
        </div></br></br><br>

        </div>
      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="ENVIAR" >
      <input type="Button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()"></br>
      <!-- <input type="Button" style="width: 398px;height:10;text-align: center;" value="ESQUECI A SENHA"></br> -->
      <input type="Button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'index.php';">
   
    
</body>
</html>


<?php 
require "conexao.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nova_senha']) && isset($_POST['confirma_senha'])) {
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];

    if ($nova_senha === $confirma_senha) {
        $usuario_id = $_SESSION['user_id'];

        $sql = "UPDATE tb_professor SET senha = ? WHERE id_professor = ?"; 
        $stmt = $con->prepare($sql);
        $stmt->bind_param("si", $confirma_senha, $usuario_id);

        if ($stmt->execute()) {
            $_SESSION['mensagemSucesso'] = "Senha redefinida com sucesso!";
            header("Location: tela_principal_professor.php");
            exit; // Encerre o script após redirecionar
        } else {
            $_SESSION['mensagemErro'] = "Erro ao redefinir a senha.";
        }
    } else {
        $_SESSION['mensagemErro'] = "As senhas não coincidem. Tente novamente.";
    }
}
?>

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

<!-- Exibir a mensagem de erro caso exista -->
      <?php
      
        if (isset($_SESSION['mensagemErro']) && !empty($_SESSION['mensagemErro'])) {
          echo '<div class="mensagem-erro">' . $_SESSION['mensagemErro'] . '</div>';
          $_SESSION['mensagemErro'] = ''; // Limpa a mensagem de erro da sessão após exibi-la
        }
        ?>

