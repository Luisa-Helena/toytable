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
    <link rel="stylesheet" href="CSS/caixa_texto_form.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <link rel="stylesheet" href="CSS/link.css">
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

<!--Função de limpar-->
<script>
        function limparCampos() {
            document.getElementById('nome').value = '';
            document.getElementById('cpf').value = '';
            document.getElementById('email').value = '';
            document.getElementById('telefone').value = '';
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
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>"required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo isset($telefone) ? $telefone : ''; ?>" required autocomplete="off">
      </div> <br><br>
    </form>

      <div class="desativa">
            <label for="linkdesativa" id="linkdesativa">Desativar conta</label>
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <h2>Confirmação</h2>
                <p>Tem certeza de que deseja desativar sua conta?</p>
                <button id="cancelar">Cancelar</button>
                <button id="sim">Sim</button>
            </div>
        </div>
        <script>
            document.getElementById('linkdesativa').addEventListener('click', function() {
                document.getElementById('modal').style.display = 'block';
            });

            document.getElementById('cancelar').addEventListener('click', function() {
                document.getElementById('modal').style.display = 'none';
            });

            document.getElementById('sim').addEventListener('click', function() {
                // Execute a solicitação AJAX para o arquivo PHP
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'desativa_professor.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        alert(response); // Exibe a resposta do servidor
                        document.getElementById('modal').style.display = 'none'; 
                        window.location.href = 'home.php';
                    }
                };
                xhr.send();
            });
        </script>

      <div class="form-group">
      <input type="submit" style="width: 197px;height:10;text-align: center;" value="ATUALIZAR DADOS">
      <input type="button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()">
      <input type="button" style="width: 398px;height:10;text-align: center;" value="VOLTAR" onclick="window.location.href = 'tela_principal_professor.php';">
   
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