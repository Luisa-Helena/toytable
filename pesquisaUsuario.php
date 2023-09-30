<?php
  include "conexao.php";
  //recebendo os dados que foram digitado no formulario

  $email=filter_input(INPUT_POST,'e',FILTER_SANITIZE_EMAIL);
  $senha=filter_input(INPUT_POST,'s',FILTER_SANITIZE_SPECIAL_CHARS);

  $comandoSql = "select * from tb_professor where email='$email' 
                and senha='$senha'";

  $resultado = $pdo->query($comandoSql);
  if($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
        echo $linha["id_usuario"];

    //echo "nome:{$linha['nome_usuario']} tipo: {$linha['tipo_usuario']}";
   // echo "Usuario encontrado";

  }
  //else 
    //echo "Usuario não encontrado";
?>