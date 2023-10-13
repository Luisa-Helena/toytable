<?php require_once "conexao.php";
session_start();

$cod_professor = $_SESSION['professor_id'];

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error']) {
        die("Falha ao enviar arquivo");
    }

    if ($arquivo['size'] > 2097152) {
        die("Arquivo muito grande!! Max: 2MB");
    }

    $pasta = __DIR__ . "/upload/";  // Caminho absoluto para o diretório "arquivos"

    if (!file_exists($pasta)) {
        // Cria o diretório se ele não existir
        mkdir($pasta, 0777, true);
    }
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $path_relativo = "arquivos/upload/" . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    if ($deu_certo) {
        $con->query("INSERT INTO tb_arquivo (nome, caminho, cod_professor, data_upload) VALUES('$nomeDoArquivo','$path_relativo', '$cod_professor', SYSDATE())") or die($con->error);
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        header("Location: ../tela_principal_professor.php");
        // echo "<p>Arquivo enviado com sucesso! Para acessá-lo, <a target=\"_blank\" href='arquivos/$novoNomeDoArquivo.$extensao'> clique aqui </a> </p>";
    } else {
        echo "<p>Falha ao enviar arquivo</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto de Perfil</title>

    <link rel="stylesheet" href="../CSS/barra_superior.css">
    <link rel="stylesheet" href="../CSS/titulo.css">
    <link rel="stylesheet" href="../CSS/barra_inferior.css">
    <link rel="stylesheet" href="../CSS/toytable.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/botao_sair.css">
    <link rel="stylesheet" href="../CSS/link.css">
    <link rel="stylesheet" href="../CSS/modal.css">
    <link rel="stylesheet" href="../CSS/upload_foto.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        @font-face {
            font-family: 'Graduate';
            src: url('../Graduate-Regular.ttf') format('truetype');
            /* Adicione outros formatos de fonte, se necessário */
        }

        @font-face {
            font-family: 'Modak';
            src: url('../Modak-Regular.ttf') format('truetype');
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
        <img src="../CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'">
        <div class="titulo"> SELECIONE UM ARQUIVO </div>
    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>

    <div class="form-container">
        <form method='POST' enctype='multipart/form-data' action="">
            <div class="texto">
                <label for=""> SELECIONE O ARQUIVO PARA A FOTO DE PERFIL </label>    
            </div>
            <input name="arquivo" type="file">
            <button name="upload" type="submit"> Enviar arquivo </button>

        </form>
    </div>

</body>

</html>