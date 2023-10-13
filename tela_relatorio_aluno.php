<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>

    <link rel="stylesheet" href="CSS/relatorio.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botao_sair.css">
    <link rel="stylesheet" href="CSS/modal_relatorio.css">

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

<body>
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
        <div class="titulo"> RELATÓRIO </div>

    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>
    <div class="container">
        <div class="form-container">
            <div class="caixa">
                <form action="cadastrar_relatorio.php" method="POST">
                    <label for="titulo" style="font-weight: bold; margin-left:15px; margin-top:10px; font-size:20px;">Título:
                    </label>
                    <input type="text" id="titulo" name="titulo" style="margin-top:10px" autocomplete="off" required>
                    <div class="campo_texto">
                    <textarea id="campo_texto" name="campo_texto"  autocomplete="off" required placeholder="Digite o relatório aqui..."></textarea>
                    </div>
            </div>
            <div class="campo">
                <div class="informacao">ALUNO: </div>
                <div class="informacoes">
                    <?php   
                    $nome_aluno = $_SESSION['nome_aluno_sel'];
                    echo "<div><span>$nome_aluno</span></div>";   ?>
                </div>
            </div>
            <div class="relatorio"> RELATÓRIO </div>
            <div class="botao">
                <input type="submit" style="width: 120px;height:30px;text-align: center;" value="ENVIAR" onClick="abrirModal()">
            </div>
            </form>
        </div>
        <div class="menu">
            <div class="dados"> DADOS DO ALUNO </div>
            <div class="dados-jogo">FASE:
                <div><span> ......... </span></div>
            </div>
            <div class="dados-jogo">MORTES:
                <div><span> ......... </span></div>
            </div>
            <div class="dados-jogo">TEMPO:
                <div><span> ......... </span></div>
            </div>
            
       <!-- Exibir a mensagem de erro caso exista -->
   <?php
        if (isset($_SESSION['mensagemErro']) && !empty($_SESSION['mensagemErro'])) {
          echo '<div class="mensagem-erro">' . $_SESSION['mensagemErro'] . '</div>';
          $_SESSION['mensagemErro'] = ''; // Limpa a mensagem de erro da sessão após exibi-la
        }
        ?>
            <div class="botao-escuro" onclick="window.location.href = 'tela_lista_relatorio.php';"> TODOS RELATÓRIOS </div>
            <div class="botao-voltar" onclick="window.location.href = 'tela_listar_aluno.php?idTurmaSel=<?php echo $_SESSION['id_turma_sel']; ?>';"> VOLTAR</div>

        </div>

    </div>
</body>

</html>