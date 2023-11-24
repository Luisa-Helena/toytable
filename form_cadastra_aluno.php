<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Aluno </title>
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
        <div class="titulo">CADASTRO</div>
    </div>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>
    <br><br><br><br><br><br>
    <div class="form-container">

        <form action="cadastrar_aluno.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome do aluno:</label>
                <input type="text" id="nome" name="nome" autocomplete="off" required>
            </div><br>
            <!-- COMBOBOX DAS TURMAS, DADOS VINDOS DO BANCO -->
            <div class="form-group">
                <label for="opcoes">Turma:</label>
                <select id="opcoes" name="opcoes" required autocomplete="off">
                <option value="selected">Selecione uma Turma</option>
                    <?php require "conexao.php";
                    $id_professor=$_SESSION['professor_id'];
                    $sql = "SELECT nome, id_turma FROM tb_turma WHERE cod_professor= '$id_professor'";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $nome = $row["nome"];
                            $id_turma = $row["id_turma"];
                            echo "<option value='$id_turma'>$nome</option>";
                        }
                    }
                    ?>
            </div>
            <div class="form-group">
                <input type="submit" style="margin-top:125px; width: 197px;height:10;text-align: center;" value="CADASTRAR">
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