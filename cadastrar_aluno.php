<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title> Cadastro de Aluno </title>
</head>
<body>

    <div class="container">
    <?php require "conexao.php";

//pegando os dados do formulário 
    $cod_turma=$_POST["cod_turma"];
    $nome=$_POST["nome"];

//mandando os dados para o banco
    $comandoSql="insert into tb_aluno (cod_turma, nome)
       values ('$cod_turma','$nome')";
   
      $resultado=mysqli_query($con,$comandoSql);

      if($resultado==true)
        echo "Cadastrado com sucesso";
      else
        echo "Erro no cadastro";

        ?>
        </div>
</body>
</html>