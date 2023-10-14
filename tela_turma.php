<?php session_start();
require "conexao.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Turmas </title>

    <link rel="stylesheet" href="CSS/caixa_dados_professor.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/turma.css">
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

    <div class="menu">
    <?php 
           $id_professor = $_SESSION["professor_id"];
           $sql_foto="SELECT caminho FROM tb_arquivo WHERE cod_professor = '$id_professor' ORDER BY data_upload DESC LIMIT 1;";
           $result_foto = $con->query($sql_foto);

           if ($result_foto && $result_foto->num_rows > 0) {
                $row_foto = $result_foto->fetch_assoc();
                $path_relativo = $row_foto["caminho"];
            
                echo '<img class="foto-perfil" src="' . $path_relativo . '" onclick="window.location.href = \'arquivos/form_upload.php\'">';
            } else {
                echo '<img class="foto" src="CSS/imagens/foto.png" onclick="window.location.href = \'arquivos/form_upload.php\'">';
            }
            ?>
        <div class="botao-perfil">
            <input type="button" value="MEU PERFIL" onClick="window.location.href = 'tela_principal_professor.php';">
        </div>
        <div class="botao-turma">
            <input type="button" style="background-color:#BCEEFF;" value="TURMAS" onClick="window.location.href = 'tela_turma.php';">
        </div>
        <div class="botao-jogo">
            <input type="button" value="JOGOS" onClick="window.location.href = 'tela_jogo.php';">
        </div>
    </div>
    </div>

    <table>
        <tr>
            <td>
                <div class="turma_add" onclick="addTurma()">
                    <div class="texto"> </div>
                </div>
            </td>

            <script>
                function addTurma() {
                    window.location.href = 'form_cadastra_turma.php';
                }

                function Turma() {
                    window.location.href = 'tela_listar_aluno.php';
                }
            </script>

</body>
</html>

<?php
require "conexao.php";
// var_dump($_SESSION);

   $professor_id = $_SESSION['professor_id'];
    
    $sql_turmas = "SELECT nome FROM tb_turma WHERE cod_professor = $professor_id";

    $result_turmas = $con->query($sql_turmas);

    echo "<script>";
    echo "var con = '" . json_encode($con) . "';";
    echo "</script>";
    if ($result_turmas->num_rows > 0) {
        while ($row_turma = $result_turmas->fetch_assoc()) {
            $nome_turma = $row_turma["nome"];

            echo '<td>';

            echo '<div class="turma">';

            echo '<div class="texto" onClick="Turma(\'' . $nome_turma . '\')">' . $nome_turma . '</div> ';

            echo '</div>';
?>
            <script>
                function Turma(nomeTurma) {
                    if (nomeTurma && nomeTurma.trim() !== '') {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'consulta_turma.php?nomeTurma=' + encodeURIComponent(nomeTurma), true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        // Armazene o ID da turma na sessão
                                        sessionStorage.setItem('id_turma_sel', response.id_turma);
                                        // Redirecione para a página de listar alunos com o ID da turma
                                        window.location.href = 'tela_listar_aluno.php?idTurmaSel=' + response.id_turma + '&searchText=';
                                    } else {
                                        alert('Turma não encontrada.');
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
            echo '</td>';
        }
    } else {
        echo "Nenhuma turma encontrada para este professor.";
    }


echo "</tr></table>";

?>