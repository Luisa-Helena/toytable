<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turma</title>
</head>
<body>
  
    <div class="container">

<?php session_start(); 
require "conexao.php";
      $nome_turma=$_POST["nome"];
      $qtd_aluno=$_POST["qtd_aluno"];
      $faixa_etaria=$_POST["faixa_etaria"];
      // var_dump($_SESSION); 
      $professor_id = $_SESSION['professor_id'];

      // $val_nome= "SELECT COUNT(*) as count FROM tb_turma WHERE nome = ?";
  
      // // Validação para o nome
      // $stmt_nome = $con->prepare($val_nome);
      // $stmt_nome->bind_param("s", $nome_turma);
      // $stmt_nome->execute();
      // $result_nome = $stmt_nome->get_result();
      // $row_nome = $result_nome->fetch_assoc();

      // if ($row_nome['count'] > 0) {
      //   $_SESSION['mensagemErro'] = 'Parece já existe uma turma com esse nome. Por favor, tente novamente.';
      //   header("Location: form_cadastra_turma.php");
      //   exit;
      //   } else if (is_numeric($input)) {
            $comandoSql="insert into tb_turma (cod_professor, qtd_aluno, faixa_etaria, nome)
            values ('$professor_id','$qtd_aluno','$faixa_etaria', '$nome_turma')";
            $resultado=mysqli_query($con,$comandoSql);

            if($resultado==true)
                header('Location: tela_turma.php');
            else
                echo "Erro no cadastro";
      // } else {
      //     echo "Não é um número.";
      // } 

   ?>
  </div>
</body>
</html>