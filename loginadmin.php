<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styleloginadmin.css">
  <link rel="shortcut icon" href="imagens/Alpha_Go_2_2[1406].png" /> 
  <title>Login do administrador</title>
</head>
<body>

 <div id="form">
 <?php 
            // Se existir uma mensagem em caso de algum erro, deve exibi-la
            if(isset($_GET["msg"])) {
                echo "<b>" . $_GET["msg"] . "</b>";
            }
        ?>  
  <form action="autenticacao.php" method="POST">
    <h2 class="title">Login do administrador</h2>


    <label for="email">Email</label required>
    <div class="input">
      
      <input name="email" id="login" type="text" required>
    </div>

      <label for="senha">Senha</label required>
      <div class="input">
       
        <input name="senha" id="senha" type="password" required>
    </div>

    <div id="btn">
      <button value="entrar" id="entrar" name="entrar" type="submit">Entrar</button>
     </div>
       </form>
    </div> 
  </body>
</html>