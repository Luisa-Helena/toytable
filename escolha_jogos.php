<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha dos jogos</title>
    <link rel="stylesheet" type="text/html" href="jogos.html">
</head>
<body>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body {
      font-family: Arial, sans-serif;
      background: #FFFFFF;
    }
    
    header{
        background: #6495ED;
        color:#000000;
        justify-content: left;
        text-align: center;
        font-family:Stencil Std, fantasy;
        font-size:35px; 
        display: flex; 
        align-items: center;
        height: 8vh; 
        position: absolute; 
        width: 100%

    }
     
main{
  height: 52vh;
}
    .form-container {
      max-width: 1050px; /*largura formulario*/
      margin: 0 auto;
      padding: 40px; /*tamanho do formulario*/
      border-radius: 40px;
      background-color: #B0C4DE	;
    }
  
    .form-container h2 {
      text-align: center;
    }
  
    .form-group {
      margin-bottom: 5px; /*espacamento entre os campos*/
    }
  
    .form-group label {
      display: block;
      margin-bottom: 10px;
    }
  
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc; /*cor da borda dos botoes*/
      border-radius: 10px;
      width: 388px;
      height:10;
      text-align: center
    }
  
    .form-group input[type="submit"] {
      background-color: #6495ED; /*cor do botao*/
      color: #fff; /*cor da letra do botao*/
      cursor: pointer;
    }
  
    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
  

   
    </style>
    </head>
<body>
<header> <img src="imagens/logo.png" width=100 height=100> <a>VAMOS BRINCAR</a></header>

    <?php require "index.php"?> </br></br></br></br></br></br>
  <div class="form-container">
  </div>
</body>
</html>
