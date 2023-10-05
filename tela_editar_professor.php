<?php session_start(); 
 require "conexao.php"; 
 $id_professor = $_SESSION['professor_id']; 
 
 $sql = "SELECT nome, cpf, email, telefone FROM tb_professor WHERE id_professor = ?";
 $stmt = $con->prepare($sql);
 $stmt->bind_param("i", $id_professor);
 $stmt->execute();
 $result = $stmt->get_result();
 
 if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $nome = $row['nome'];
     $cpf = $row['cpf'];
     $email = $row['email'];
     $telefone = $row['telefone'];
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar dados </title>
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
            document.getElementById('cpf').value = '';
            document.getElementById('email').value = '';
            document.getElementById('telefone').value = '';
            document.getElementById('senha').value = '';
            // Limpar outros campos do formulário aqui, se houver
        }
    </script>

<div class="header">
<img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
<div class="titulo">EDITAR DADOS</div>
</div>
<div class="footer">Email para contato: toytable2023@gmail.com</div>
   <br><br><br><br><br><br>
  <div class="form-container">
       
    <form action= "editar_professor.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>"required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo isset($telefone) ? $telefone : ''; ?>" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha atual:</label>
        <input type="password" id="senha_atual" name="senha_atual">
      </div>
      <div class="input-imagem3">
      <img class="ver-senha-icon-cadastro" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha()">
      </div>
      <div class="form-group">
        <label for="senha">Nova senha:</label>
        <input type="password" id="nova_senha" name="nova_senha">
      </div>
      <div class="input-imagem3">
      <img class="ver-senha-icon-cadastro" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha()">
      </div>
      <div class="form-group">
        <label for="senha">Confirme a nova senha:</label>
        <input type="password" id="confirma_nova_senha" name="confirma_nova_senha">
      </div>
      <div class="input-imagem3">
      <img class="ver-senha-icon-cadastro" src="senha_oculta.png" alt="Senha Oculta" onclick="verSenha()">
      </div><br><br>
      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="ATUALIZAR DADOS">
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