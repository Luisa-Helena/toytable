<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Turma </title>
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


<!--Função de limpar-->
<script>
        function limparCampos() {
            document.getElementById('nome').value = '';
            document.getElementById('qtd_aluno').value = '';
            // Limpar outros campos do formulário aqui, se houver
        }
    </script>

<div class="header">
<img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
<div class="titulo">CADASTRO </div>
</div>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
   <br><br><br><br><br><br>
  <div class="form-container">
       
    <form action="cadastrar_turma.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="qtd_aluno">Quantidade de alunos:</label>
        <input type="text" id="qtd_aluno" name="qtd_aluno" required>
      </div>
      <div class="form-group">
        <label for="faixa_etaria">Faixa Etária:</label><br>
        <select id="faixa_etaria" name="faixa_etaria" required>
            <option value=""></option>
            <option value="a">1-3 anos</option>
            <option value="b">4-5 anos</option>
            <option value="c">6 anos</option>
        </select>
    </div> <br> <br> <br> <br>

       <!-- Exibir a mensagem de erro caso exista -->
   <?php
        if (isset($_SESSION['mensagemErro']) && !empty($_SESSION['mensagemErro'])) {
          echo '<div class="mensagem-erro">' . $_SESSION['mensagemErro'] . '</div>';
          $_SESSION['mensagemErro'] = ''; // Limpa a mensagem de erro da sessão após exibi-la
        }
        ?>
    
      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="CADASTRAR">
      <input type="button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()">
      <input type="button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'home.php';">
  </div>
    </form>
  </div>
   
<script src="js/scripts.js" type="text/javascript"> </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>
</html>

