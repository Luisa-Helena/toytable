<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Aluno</title>

    <link rel="stylesheet" href="CSS/caixa_texto_form.css">
    <link rel="stylesheet" href="CSS/mensagem_erro_login.css">
    <link rel="stylesheet" href="CSS/botoes_input.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/ver_senha.css">
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
            document.getElementById('nome').value = 'Selecione uma turma';
            document.getElementById('turma').value = '';
        }
    </script>


    </head>

    <body>

        <?php
        // Conexão com o banco de dados
        require "conexao.php";

        // Consulta SQL para buscar nomes de turmas
        $query = "SELECT nome, id_turma FROM tb_turma";
        $resultado = $con->query($query);

        ?>

        <div class="header">
            <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'">
            <div class="titulo"> LOGIN </div>
        </div>
        <br><br><br><br><br><br>
        <div class="footer">Email para contato: toytable2023@gmail.com</div>

        <div class="form-container">
            <div class="form-group">
                <form action="login_aluno.php" method="POST">
                <label for="turma">Turma:</label><br>
                <select id="turma" name="turma" required>
                    <option value="selected">Selecione uma Turma</option>
                    <?php
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<option value='" . $row['id_turma'] . "'>" . $row['nome'] . "</option>";
                    }
                    ?>  
                </select>
            </div><br>
            <div class="form-group">
                <label for="nome">ALUNO:</label><br>
                <select id="nome" name="nome" required>
                    <option value="selected">Selecione um aluno</option>
                </div> 
            
            <div class="form-group">
                <input type="submit" id="Botao" style="margin-top:100px; width: 197px;height:10;text-align: center;" value="ENTRAR" disabled>
                <input type="Button" style="width: 197px;height:10;text-align: center;" value="LIMPAR" onClick="limparCampos()"></br>
                <input type="Button" style="width: 398px;height:10;text-align: center;" value="ESQUECI A SENHA"></br>
                <input type="Button" style="width: 398px;height:10;text-align: center;" value="VOLTAR AO INÍCIO" onclick="window.location.href = 'home.php';">
            </div>
                </form>
                <!-- Exibir a mensagem de erro caso exista -->
                <?php
                if (isset($_SESSION['mensagemErro']) && !empty($_SESSION['mensagemErro'])) {
                    echo '<div class="mensagem-erro">' . $_SESSION['mensagemErro'] . '</div>';
                    $_SESSION['mensagemErro'] = ''; // Limpa a mensagem de erro da sessão após exibi-la
                }
                ?>

        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#turma").change(function() {
                        var turmaSelecionada = $(this).val();

                        $.ajax({
                            type: "POST",
                            url: "carregar_alunos.php",
                            data: {
                                turma: turmaSelecionada
                            },
                            dataType: "html",
                            success: function(response) {
                                $("#nome").html(response);
                            }
                        });
                    });
                });
            </script>

            <script src="js/scripts.js" type="text/javascript"> </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script>
                var campoSelect = document.getElementById("nome");
                var Botao = document.getElementById("Botao");

                campoSelect.addEventListener('change', function() {
                    debugger;
                    if (campoSelect.value !== '') {
                        Botao.disabled = false;
                    } else {
                        Botao.disabled = true;
                    }
                });
            </script>
    </body>

</html>