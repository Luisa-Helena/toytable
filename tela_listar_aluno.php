<?php require_once "conexao.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Listagem de alunos </title>

    <link rel="stylesheet" href="CSS/lista_aluno.css">
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
    </div>
    <div class="form-container">
        <div class="aluno"> ALUNOS </div>
        <?php
        session_start();

        if (isset($_GET['idTurmaSel'])) {
            $idTurmaSel = $_GET['idTurmaSel'];

            $sql = "SELECT nome FROM tb_aluno WHERE cod_turma = '$idTurmaSel'";
            $result = $con->query($sql);

            echo "<table>";
            echo "<script>";
            echo "var con = '" . json_encode($con) . "';";
            echo "</script>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nome_aluno = $row["nome"];
                    echo "<li>";
                    echo '<mark onClick="Aluno(\'' . $nome_aluno . '\')">' . $nome_aluno . '</mark>';
                    echo "</li>";
                }
            } ?>
            <script>
                function Aluno(nomeAluno) {
                    if (nomeAluno && nomeAluno.trim() !== '') {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'consulta_aluno.php?nomeAluno=' + encodeURIComponent(nomeAluno), true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        sessionStorage.setItem('id_aluno_sel', response.id_aluno);
                                        sessionStorage.setItem('nome_aluno_sel', response.nome_aluno);
                                        window.location.href = 'tela_relatorio_aluno.php?idAlunoSel=' + response.id_aluno;
                                    }
                                } else {
                                    alert('Erro na requisição.');
                                }
                            }
                        };
                        xhr.send();
                    } else {
                        alert("Erro: Nome da turma inválido.");
                    }
                }
            </script>
        <?php
            echo "</table>";
        } else {
            $response = array('success' => false);
            echo json_encode($response);
        }
        ?>
    </div>
    <div class="menu">
        <div class="dados"> TURMA: </div>
        <div class="dados-bd">
            <?php
            require_once "conexao.php";
            $id_turma = $_SESSION['id_turma_sel'];
            $sql = "SELECT nome FROM tb_turma WHERE id_turma='$id_turma'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome_turma = $row["nome"];
                echo "<span> $nome_turma </span>";
            } else {
                echo " Erro para encontrar a turma";
            }
            ?>
        </div>
    </div>
    <div class="botao" onclick="window.location.href = 'form_cadastra_aluno.php';">CADASTRAR ALUNO</div>
    <div class="botao-voltar" onclick="window.location.href = 'tela_turma.php';">VOLTAR</div>
</body>

</html>