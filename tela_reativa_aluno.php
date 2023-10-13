<?php 
require_once "conexao.php";
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alunos desativados </title>

    <link rel="stylesheet" href="CSS/lista_aluno.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/link.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botao_sair.css">
    <link rel="stylesheet" href="CSS/barra_pesquisa.css">
    <link rel="stylesheet" href="CSS/caixa_dados_professor.css">

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
        <div class="aluno"> ALUNOS DESATIVADOS  </div>

        <?php
        if (isset($_SESSION['id_turma_sel'])) {            
            $idTurmaSel = $_SESSION['id_turma_sel'];
            
            $sql = "SELECT nome FROM tb_aluno WHERE cod_turma = '$idTurmaSel' and status = 0";
            $result = $con->query($sql);        
            echo "<table>";
            echo "<div class='teste'>";
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
    </div>

    </div>

    <!-- FUNÇÃO PARA IR PRA TELA DE RELATÓRIO DO ALUNO CLICADO -->
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
                                window.location.href = 'tela_reativa_aluno.php?idAlunoSel=' + response.id_aluno;
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

        </div>
    </div>
</div>
<div class="botao" onclick="window.location.href = 'form_cadastra_aluno.php';">CADASTRAR ALUNO</div>
<div class="botao-editar">
    <input type="button" value="EDITAR TURMA" onClick="window.location.href = 'tela_editar_turma.php';">
</div>
<div class="botao-voltar" onclick="window.location.href = 'tela_turma.php';">VOLTAR</div>
</body>
</html>