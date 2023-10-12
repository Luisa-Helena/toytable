<?php session_start();
require "conexao.php";
$id_aluno = $_SESSION['id_aluno_sel'];

$sql = "SELECT nome, cod_turma FROM tb_aluno WHERE id_aluno = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_aluno);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nome = $row['nome'];
  $cod_turma = $row['cod_turma'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Editar Aluno </title>
  <link rel="stylesheet" href="CSS/caixa_texto_form.css">
  <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
  <link rel="stylesheet" href="CSS/botoes_input.css">
  <link rel="stylesheet" href="CSS/barra_superior.css">
  <link rel="stylesheet" href="CSS/titulo.css">
  <link rel="stylesheet" href="CSS/link.css">
  <link rel="stylesheet" href="CSS/modal.css">
  <link rel="stylesheet" href="CSS/toytable.css">
  <link rel="stylesheet" href="CSS/botao_sair.css">
  <link rel="stylesheet" href="CSS/barra_inferior.css">
  <link rel="stylesheet" href="CSS/combobox.css">

  <style>
    * {
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
      document.getElementById('opcoes').value = 'Selecione a turma';
      // Limpar outros campos do formulário aqui, se houver
    }
  </script>


  <div class="header">
    <div class="sair">
      <input type="button" value="Sair" id="botaoSair">
    </div>

    <script>
      document.getElementById('botaoSair').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'encerrar_sessao.php', true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            alert('Você será redirecionado para a página inicial.');
            window.location.href = 'home.php';
          }
        };
        xhr.send();
      });
    </script>
    <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'">
  </div>
  <div class="footer">Email para contato: toytable2023@gmail.com</div>
  <br><br><br><br><br><br>
  <div class="form-container">

    <form action="editar_aluno.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome do aluno:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
      </div><br>
      <!-- COMBOBOX DAS TURMAS, DADOS VINDOS DO BANCO -->
      <div class="form-group">
        <label for="opcoes">Turma:</label>
        <select id="opcoes" name="opcoes" value="<?php echo $nome_turma; ?>" required>
          <option value="selected">Selecione uma Turma</option>

          <?php
          require "conexao.php";
          $id_professor = $_SESSION['professor_id'];
          $sql = "SELECT nome, id_turma FROM tb_turma WHERE cod_professor= '$id_professor'";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $nome = $row["nome"];
              $id_turma = $row["id_turma"];
              $selected = ($id_turma == $cod_turma) ? "selected" : "";
              echo "<option value='$id_turma' $selected>$nome</option>";
            }
          }
          ?>
        </select>
      </div>
      <div class="desativa-aluno">
            <label for="linkdesativa" id="linkdesativa">Desativar aluno</label>
        </div>
        <div id="modal" class="modal">
            <div class="modal-content">
                <h2>Confirmação</h2>
                <p>Tem certeza de que deseja desativar esse aluno?</p>
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
                window.location.href = 'tela_edita_aluno.php';
            });

            document.getElementById('sim').addEventListener('click', function() {
                // Execute a solicitação AJAX para o arquivo PHP
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'desativa_aluno.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        alert(response); // Exibe a resposta do servidor
                        document.getElementById('modal').style.display = 'none'; 
                        window.location.href = 'tela_listar_aluno.php?idTurmaSel=<?php echo $_SESSION['id_turma_sel']; ?>';
                    }
                };
                xhr.send();
            });
        </script>
      <div class="form-group">
        <input type="submit" style="margin-top:100px; width: 197px;height:10;text-align: center;" value="ATUALIZAR DADOS">
        <input type="button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()">
        <input type="button" style="width: 398px;height:10;text-align: center;" value="VOLTAR" onclick="window.location.href = 'tela_relatorio_aluno.php?idAlunoSel=<?php echo $_SESSION['id_aluno_sel']; ?>';">


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