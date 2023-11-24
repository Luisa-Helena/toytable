<?php session_start();
require "conexao.php";
$id_turma = $_SESSION['id_turma_sel'];

$sql = "SELECT nome, qtd_aluno, faixa_etaria FROM tb_turma WHERE id_turma= ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_turma);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nome = $row['nome'];
  $qtd_aluno = $row['qtd_aluno'];
  $faixa_etaria = $row['faixa_etaria'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Editar Turma </title>
  <link rel="stylesheet" href="CSS/caixa_texto_form.css">
  <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
  <link rel="stylesheet" href="CSS/botoes_input.css">
  <link rel="stylesheet" href="CSS/barra_superior.css">
  <link rel="stylesheet" href="CSS/titulo.css">
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
    <div class="titulo"> EDITAR DADOS DA TURMA  </div>
  </div>
  <div class="footer">Email para contato: toytable2023@gmail.com</div>
  <br><br><br><br><br><br>
  <div class="form-container">

    <form action="editar_turma.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome da turma:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required autocomplete="off">
      </div><br>
      <div class="form-group">
        <label for="qtd_aluno">Quantidade de alunos:</label>
        <input type="text" id="qtd_aluno" name="qtd_aluno"  maxlength="2" value="<?php echo $qtd_aluno; ?>"  required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="opcoes">Faixa Etária:</label>
        <select id="opcoes" name="opcoes" required>
            <?php
            $opcoes = array("4-5 anos", "6 anos"); 
            foreach ($opcoes as $opcao) {
                if ($opcao === $faixa_etaria) {
                    echo "<option value='$opcao' selected>$opcao</option>";
                } else {
                    echo "<option value='$opcao'>$opcao</option>";
                }
            }
            ?>
        </select>
      <div class="form-group">
        <input type="submit" style="margin-top:95px; width: 197px;height:10;text-align: center;" value="ATUALIZAR DADOS">
        <input type="button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()">
        <input type="button" style="width: 398px;height:10;text-align: center;" value="VOLTAR" onclick="window.location.href = 'tela_listar_aluno.php?idTurmaSel=<?php echo $_SESSION['id_turma_sel']; ?>';">

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>