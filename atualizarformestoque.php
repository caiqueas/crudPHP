<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar produto</title>
    <link rel="shortcut icon" href="imagens/Alpha_Go_2_2[1406].png" /> 
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<?php 
            // Inicia a sessao
            session_start();

            // Se existir a marcacao de estar logado
            if(isset($_SESSION["logado"]) == true) {
                //Se a maracacao esta True

                // Exibe o nome do usuario
                echo "Ola " . $_SESSION["nome"];
            } else {
                // Se a marcacao nao existir ou for falsa

                // Direciona paga a pagina de login com a mensagem de erro
                header("location:loginadmin.php?msg=PRIMEIRO VOCÊ DEVE LOGAR");
            }
        ?>

<nav id="menu-h">
        <ul>
            <li>
                <a href="administradores.php">
                    Administradores
                </a>
            </li>

            <li><a href="listarcategorias.php">Categorias</a></li>
            
            <li><a href="listarprodutos.php">Produtos</a></li>

            <li><a href="listarimagem.php">Cadastrar imagem</a></li>

            <li><a href="listarestoque.php">Estoque</a></li>
            
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>

        <h1>Atualizar estoque</h1>

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';


// Coleta os dados do Administrador
$id = $_GET["id"];
$idconvert = intval($id);

//var_dump($idconvert);

// Realiza uma Query SQL 
$admin = $pdo->query("SELECT * FROM PRODUTO_ESTOQUE WHERE PRODUTO_ID=" . $id)->fetch();

$produto = $pdo->query("SELECT * FROM PRODUTO WHERE PRODUTO_ID=" . $id)->fetch();

$qtd = $admin["PRODUTO_QTD"];
$nome = $produto["PRODUTO_NOME"];


//$produtoid = $admin["PRODUTO_ID"];

?>    

<div class="container">  
  <fieldset>            
      <form id="contact" action="atualizarestoque.php" method="POST">     
        
        <p>Nome do produto: <?php echo "$nome"?></p>

        <input type="hidden" name="IdProduto" value="<?php echo "$id"?>">
      
    <fieldset>
      <label for="">Defina uma quantidade: </label>
        <input  placeholder="Quantidade" type="number" min="0" name="qtd" id="qtd" tabindex="2" value="<?php echo $qtd ?>" required>
      </fieldset>
      <br>
        <input type="submit" value="Enviar"> 
    </form>
   
    
  </div>

</body>
</html>