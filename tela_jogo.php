<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Turmas </title>

    <link rel="stylesheet" href="CSS/jogos_disponiveis.css">


    
    <link rel="stylesheet" href="CSS/barra_superior.css">
    <link rel="stylesheet" href="CSS/titulo.css">
    <link rel="stylesheet" href="CSS/barra_inferior.css">    
    <link rel="stylesheet" href="CSS/toytable.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/botao_sair.css">
    <link rel="stylesheet" href="CSS/resposividade.css">
    
     <style>
    *{
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
                            alert('Você será redirecionado para a página de login.');
                            window.location.href = 'home.php';
                        }
                    };
                    xhr.send();
                });
            </script>
    
    <img src="CSS/imagens/logo (1).png" onclick="window.location.href = 'home.php'" >
    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>

    <div class="menu">
    <?php session_start();
    require "conexao.php";
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
        <input type="button"  value="MEU PERFIL" onClick="window.location.href = 'tela_principal_professor.php';"> 
    </div> 
    <div class="botao-turma"> 
        <input type="button"  value="TURMAS" onClick="window.location.href = 'tela_turma.php';">
    </div>
    <div class="botao-jogo"> 
        <input type="button" style="background-color:#BCEEFF;" value="JOGOS" onClick="window.location.href = 'tela_jogo.php';">
    </div>
</div>

<div class="fundo">
    <div class="banner-jogo">
        <img src='CSS/imagens/capa-jogo1.png' class='capa-jogo'>
        <div class="botao1">
            <input type="button" value="JOGAR" onclick="window.location.href = 'jump_cat/index.html';">
        </div>
    </div>
    <div class="banner-jogo">
        <img src='CSS/imagens/capa-jogo2.jpeg' class='capa-jogo'>
        <div class="botao2">
            <input type="button" value="JOGAR" onclick="window.location.href ='queen_bee/index.html';">
        </div>
</div>


</body>
</html>