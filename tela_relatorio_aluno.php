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
    <div class="header">
        <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'">
        <div class="sair">
            <input type="button" value="Sair" id="botaoSair">
        </div>
    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>
    <div class="container">
        <div class="form-container">
            <div class="caixa">
                <form action="cadastrar_relatorio.php" method="POST">
                    <div class="campo_texto">
                        <textarea id="campo_texto" name="campo_texto" required placeholder="Digite o relatório aqui..."></textarea>
                    </div>
            </div>
            <div class="campo">
                <div class="informacao">ALUNO: </div>
                <div class="informacoes">
                    <?php session_start();
                    // var_dump($_SESSION);
                    $nome_aluno = $_SESSION['nome_aluno_sel'];
                    echo "<div><span>$nome_aluno</span></div>";   ?>
                </div>
            </div>
            <div class="relatorio"> RELATÓRIO </div>
            <div class="botao">
                <input type="submit" style="width: 120px;height:30px;text-align: center;" value="ENVIAR">
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
            <div class="botao-escuro"> TODOS RELATÓRIOS </div>
            <div class="botao-voltar" onclick="window.location.href = 'tela_listar_aluno.php?idTurmaSel=<?php echo $_SESSION['id_turma_sel']; ?>';"> VOLTAR</div>

        </div>

    </div>
</body>

</html>