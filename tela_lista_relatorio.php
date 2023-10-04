<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Relatório </title>

    <link rel="stylesheet" href="CSS/caixa_dados_professor.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/turma.css">
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
    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>

    <table>         
            <?php
            require "conexao.php";
            session_start();
            $id_aluno = $_SESSION['id_aluno_sel'];
            $sql_relatorio = "SELECT cod_professor, cod_fase, descricao, data FROM tb_relatorio WHERE cod_aluno = $id_aluno";
            $result_relatorio = $con->query($sql_relatorio);

            if ($result_relatorio->num_rows > 0) {
                while ($row_relatorio = $result_relatorio->fetch_assoc()) {
                    $descricao = $row_relatorio["descricao"];
                    $fase = $row_relatorio["cod_fase"];
                    $professor = $row_relatorio["cod_professor"];
                    $data = $row_relatorio["data"];

                    echo '<td>';
                    echo '<div class="turma" onClick="abrirModal()">';
                    echo '<div class="texto">' . $data . '</div>';
                    echo '</div>';
                    echo '</td>';
                }
            } else {
                echo "Nenhuma turma encontrada para este professor.";
            }
            ?>
        </tr>
    </table>

    <div id="janela-modal" class="janela-modal">
    <div class="modal">
        <form action="cadastra_relatorio.php" method="POST">
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div><br>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>
            </div>
    </div>
</div>

<script scr="script.js"></script>

</body>
</html>
