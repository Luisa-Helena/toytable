<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Professor </title>
    <link rel="stylesheet" href="CSS/caixa_texto_form.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/toytable.css"> 
    <link rel="stylesheet" href="CSS/ver_senha.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">    
    <link rel="stylesheet" href="CSS/combobox.css">

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
            var imagemIcone = $('.ver-senha-icon-cadastro');
            
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


<!--Função de limpar-->
<script>
        function limparCampos() {
            document.getElementById('nome').value = '';
            document.getElementById('senha').value = '';
            // Limpar outros campos do formulário aqui, se houver
        }
    </script>

<div class="header">
<div class="toytable"> TOYTABLE </div>
<div class="titulo">CADASTRO</div>
</div>
    <div class="footer">Email para contato: toytable@gmail.com</div>
   <br><br><br><br><br><br>
  <div class="form-container">
       
    <form action="cadastrar_aluno.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
<!-- COMBOBOX DAS TURMAS, DADOS VINDOS DO BANCO -->

        <label for="opcoes">Selecione a turma:</label>
        <select id="opcoes" name="opcoes">
            <?php require "conexao.php";
            $sql = "SELECT nome FROM tb_turma";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nome = $row["nome"];
                    echo "<option value='$nome'>$nome</option>";
                }
            }
            ?>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
      </div>
      <div class="input-imagem2">
      <img class="ver-senha-icon-cadastro" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha()">
      </div>
      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="CADASTRAR">
      <input type="button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()">
      <input type="button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'index.php';">
      
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