<?php 
require_once "conexao.php";
session_start(); 
$teste="";
?>
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
    </div>
    <br><br><br><br><br><br>
    <div class="footer">Email para contato: toytable2023@gmail.com</div>
    </div>
    <div class="form-container">
        <div class="aluno"> ALUNOS </div>
        <div class="search-box" id="search-box">
            <input type="text" id="search-text" class="search-text" placeholder="Pesquisar">
            
            <a href="#" class="search-button" id="search-button">
                <img src="CSS/imagens/lupa.svg" alt="lupa.svg" height="13" width="13">
            </a>
        </div>

<!-- 
<div class="search-results"></div> -->

        <?php 
        if (isset($_GET['idTurmaSel'])) {            
            $idTurmaSel = $_GET['idTurmaSel'];
            $searchText = $_GET['searchText']; // Você precisa obter o valor de searchText da URL também.
            // Construa a consulta SQL com base nos parâmetros fornecidos.
            $sql = "SELECT nome FROM tb_aluno WHERE cod_turma = '$idTurmaSel' and status = 1";
            // Se searchText não estiver vazio, adicione a cláusula WHERE para filtrar por nome.
            if (!empty($searchText)) {
                $sql .= " AND nome LIKE '%$searchText%'";
            }
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
    
    <div class="lista-desativados">
        <a href="#" id="link">Alunos desativados dessa turma</a>
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
<div class="menu">
    <?php
    require_once "conexao.php";
    
    $idTurmaSel = $con->real_escape_string($idTurmaSel);
    $sql = "SELECT t.nome, t.qtd_aluno, t.faixa_etaria, COUNT(a.id_aluno) AS cont_aluno
        FROM tb_turma t
        LEFT JOIN tb_aluno a ON t.id_turma = a.cod_turma
        WHERE t.id_turma = '$idTurmaSel' AND a.status = 1
        GROUP BY t.nome, t.qtd_aluno, t.faixa_etaria;";

    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $qtd_aluno = $row["qtd_aluno"];
        $faixa_etaria = $row["faixa_etaria"];
        $cont_aluno = $row["cont_aluno"];
    } else {
        echo "Nenhum resultado encontrado.";
    }


    ?>
    <div class="dados">
        <div class="informacoes">
            <?php
            echo "<div>Turma: $nome</div>";

            echo "<div>Número de alunos: $qtd_aluno</div>";

            echo "<div>Faixa etária: $faixa_etaria</div>";

            echo "<div>Alunos cadastrados: $cont_aluno</div>";
            ?>
        </div>
    </div>
</div>
<div class="botao" onclick="window.location.href = 'form_cadastra_aluno.php';">CADASTRAR ALUNO</div>
<div class="botao-editar">
    <input type="button" value="EDITAR TURMA" onClick="window.location.href = 'tela_editar_turma.php';">
</div>
<div class="botao-voltar" onclick="window.location.href = 'tela_turma.php';">VOLTAR</div>

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


    // FAZ COM QUE A BARRA DE PESQUISA APAREÇA E  DESAPAREÇA
    const searchBox = document.getElementById('search-box');
    const searchInput = document.getElementById('search-text');
    const searchButton = document.getElementById('search-button');
    
    // searchInput.addEventListener('focus', function() {
    //     searchBox.classList.add('active');
    // });
    // document.addEventListener('click', function(event) {
    //     const isClickInsideSearchBox = searchBox.contains(event.target);

    //     if (!isClickInsideSearchBox) {
    //         searchBox.classList.remove('active');
    //     }
    // });

    // searchButton.addEventListener('click', function(event) {
    //     event.preventDefault();
    //     searchInput.focus();
    //     searchBox.classList.add('active');
    // });

    // Pega a string da query da URL
    const queryString = window.location.search;

    const params = new URLSearchParams(queryString);

    const idTurmaSel = params.get("idTurmaSel");

    
    // FUNÇÃO PARA EXIBIR O RESULTADO DA BUSCA
    function searchAluno() {
        const idTurmaSel_var =  idTurmaSel; 
        const searchText = searchInput.value;
        const url  = 'tela_listar_aluno.php?idTurmaSel=' + idTurmaSel_var+ '&searchText=' + searchText;
        window.location.href = url;
    }

// Habilitar a busca ao pressionar Enter
searchInput.addEventListener('keyup', function(event) {
        if (searchBox.classList.contains('active') &&  searchInput.value.length > 0) {
            if (event.keyCode === 13) {
                event.preventDefault();
                searchAluno();
            }
        }    
    });

// Expandir campo de busca
searchButton.addEventListener('click', function(event) {
    if (searchBox.classList.contains('active')) {
        searchAluno();
    } else {
        searchBox.classList.add('active');
    }
});

document.addEventListener('click', function(event){
    if(!searchBox.contains(event.target)){
        searchBox.classList.remove('active');
    }
});

    // TORNA A FRASE CLICAVEL
    document.getElementById('link').addEventListener('click', function() {
            window.location.href = 'tela_listar_aluno_desativados.php';
        });

    // FUNÇÃO PARA IR PRA TELA DE RELATÓRIO DO ALUNO CLICADO
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>