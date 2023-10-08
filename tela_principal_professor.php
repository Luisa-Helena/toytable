<!-- DADOS Professor  -->
<?php
session_start();
// var_dump($_SESSION); 
require "conexao.php";
if (isset($_SESSION['professor_id'])) {
    $id_professor = $_SESSION["professor_id"];

    $sql = "SELECT p.email, p.id_professor, p.nome, p.CPF, p.telefone, p.senha, p.email, COUNT(t.id_turma) AS quantidade_turmas 
            FROM tb_professor p
            LEFT JOIN tb_turma t ON p.id_professor = t.cod_professor
            WHERE p.id_professor = '$id_professor' GROUP BY p.email, p.nome, p.CPF, p.telefone, p.senha, p.email;";
    $result = $con->query($sql);

    // $stmt = $con->prepare($sql);
    // $stmt->bind_param("ss", $user_email, $user_senha);
    // $stmt->execute();
    // $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $cpf = $row["CPF"];
        $email = $row["email"];
        $telefone = $row["telefone"];
        $email = $row["email"];
        $qtd_turmas = $row["quantidade_turmas"];
    } else {
        echo "Nenhum resultado encontrado.";
    }
} else {
    header('Location: form_login_professor.php');
    exit();
}
?>
<!-- FIM -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>

    <link rel="stylesheet" href="CSS/caixa_dados_professor.css">
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/menu.css">
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
        <div class="botao-perfil">
            <input type="button" style="background-color:#BCEEFF;" value="MEU PERFIL" onClick="window.location.href = 'tela_principal_professor.php';">
        </div>
        <div class="botao-turma">
            <input type="button" value="TURMAS" onClick="window.location.href = 'tela_turma.php';">
        </div>
        <div class="botao-jogo">
            <input type="button" value="JOGOS" onClick="window.location.href = 'tela_jogo.php';">
        </div>
    </div>
    <div class="caixa">
        <label>MINHAS INFORMAÇÕES </label> <br>
        <div class="informacoes">
            <?php
            echo "<div>NOME: <span>$nome</span></div>";

            echo "<div>CPF: <span>$cpf</span></div>";

            echo "<div>EMAIL: <span>$email</span></div>";

            echo "<div>TELEFONE: <span>$telefone</span></div>";

            echo "<div>TOTAL DE TURMAS: <span>$qtd_turmas</span></div>";
            ?>
        </div>
        <div class="editar">
            <form method="post">
            <input type="submit" name="setSessionButton" value="SENHA">
            </form>

            <?php
            if (isset($_POST['setSessionButton'])) {
                $_SESSION['titulo'] = 'ALTERAR SENHA';
                header("Location: form_esqueceu_senha.php");
                exit(); 
            }
            ?>
            <input type="button" value="EDITAR" onClick="window.location.href = 'tela_editar_professor.php';">
        </div>
    </div>
</body>

</html>