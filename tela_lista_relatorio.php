<?php require_once "conexao.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Listagem de alunos </title>

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
    <link rel="stylesheet" href="CSS/modal_relatorio.css">

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
        <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'">
        <div class="titulo"> TODOS RELATÓRIOS  </div>
    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>
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

    <div class="form-container">
        <div class="aluno"> Relatórios -> <?php 
        $id_aluno = $_SESSION['id_aluno_sel'];  
        $sql_nome= "SELECT nome FROM tb_aluno WHERE id_aluno = '$id_aluno';";
         $result_nome = $con->query($sql_nome);  
         if ($result_nome->num_rows > 0) {
            $row_nome = $result_nome->fetch_assoc();
            $nome = $row_nome["nome"]; 
            } 
            echo $nome;
            ?> </div>

        <?php require_once "conexao.php";
        if (isset($_SESSION['id_aluno_sel'])) {
            $id_aluno = $_SESSION['id_aluno_sel'];
            $sql = "SELECT titulo, id_relatorio, descricao FROM tb_relatorio WHERE cod_aluno = '$id_aluno'";
            $result = $con->query($sql);
            echo "<table>";
            echo "<div class='teste'>";
            echo "<script>";
            echo "var con = '" . json_encode($con) . "';";
            echo "</script>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $titulo = $row["titulo"];
                    $id_relatorio = $row["id_relatorio"];
                    $_SESSION["id_relatorio"] = $id_relatorio;
                    $descricao = $row["descricao"];
                    echo "<li>";
                    echo '<mark data-idRelatorio="' . $id_relatorio . '" data-titulo="' . $titulo . '" data-descricao="' . $descricao . '">' . $titulo . '</mark>';
                    echo "</li>";
                }
            } ?>
    </div>
    </div>

<?php
            echo "</table>";
        } else {
            $response = array('success' => false);
            echo json_encode($response);
        }
?>
</div>
<div id="relatorioModal" class="modal">
    <div class="modal-content">
        <h2 id="modalTitulo"></h2> <br><br>
        <div class="texto">
            <div class="descricao">
                <p id="modalDescricao"><span></span></p>
            </div>
        </div>
            <button id="cancelar">Cancelar</button>
            <button id="editar">Editar</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elementosMark = document.querySelectorAll('mark');
    elementosMark.forEach(function(elemento) {
        elemento.addEventListener('click', function() {

            var idRelatorioSel = this.getAttribute('data-idRelatorio');
            var titulo = this.getAttribute('data-titulo');
            var descricao = this.getAttribute('data-descricao');

            sessionStorage.setItem('idRelatorioSel', idRelatorioSel);
            sessionStorage.setItem('tituloSel', titulo);
            sessionStorage.setItem('descricaoSel', descricao);

            var modal = document.getElementById('relatorioModal');
            modal.style.display = 'block';

            var modalTitulo = document.getElementById('modalTitulo');
            var modalDescricao = document.getElementById('modalDescricao');

            modalTitulo.textContent = titulo;
            modalDescricao.textContent = descricao;
        });
    });
        document.getElementById('cancelar').addEventListener('click', function() {
            var modal = document.getElementById('relatorioModal');
            modal.style.display = 'none';
        });

        document.getElementById('editar').addEventListener('click', function() {
            var idRelatorioSel = sessionStorage.getItem('idRelatorioSel');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'tela_editar_relatorio.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            var data = 'id=' + idRelatorioSel;
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    var modal = document.getElementById('relatorioModal');
                    modal.style.display = 'none'; // Fecha o modal
                    window.location.href = 'tela_editar_relatorio.php';

                }
            };
            xhr.send(data);
        });

    });
</script>

<div class="botao" onclick="window.location.href = 'form_cadastra_aluno.php';">CADASTRAR ALUNO</div>
<div class="botao-editar">
    <input type="button" value="EDITAR TURMA" onClick="window.location.href = 'tela_editar_turma.php';">
</div>
<div class="botao-voltar" onclick="window.location.href = 'tela_turma.php';">VOLTAR</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>