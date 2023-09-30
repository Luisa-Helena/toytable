<?php

function select_lista_professor(){

/*1- realizando a conexao com o banco de dados (local, usuario,senha,nomeBanco)*/
     //$con=mysqli_connect("localhost","root","","bd_projeto");  
     require "conexao.php";
     
     /*2- criando o comando sql para consulta dos registros */
     $comandoSql= "select id_professor, nome  from tb_professor";

     /*3- executando o comando sql */
     $resultado=mysqli_query($con,$comandoSql);
     
    echo"<select name='professor' class='form-control'>";


     /*4- pegando os dados da consulta criada e exibindo */
     while($dados=mysqli_fetch_assoc($resultado)){
       $id= $dados["id_professor"];
       $nome_professor=$dados["nome"];

       echo "<option value=$id> $nome_professor </option>";

     }

     echo"</select>";

    }