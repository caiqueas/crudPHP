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

        <h1>Atualizar produto</h1>

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

// Coleta os dados do Administrador
$id = $_GET["id"];


// Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo usuario
$admin = $pdo->query("SELECT * FROM PRODUTO WHERE PRODUTO_ID=" . $id)->fetch();

$nome = $admin["PRODUTO_NOME"];
$descricao = $admin["PRODUTO_DESC"];
$preco = $admin["PRODUTO_PRECO"];
$desconto = $admin["PRODUTO_DESCONTO"];

?>    

<div class="container">  
    <form id="contact" action="atualizarproduto.php" method="POST">
      <fieldset>

        <label for="">Nome Do Produto:</label>
        <input placeholder="Nome do produto" type="text" name="nome" value="<?php echo $nome ?>" id="nome" tabindex="1"  required>
      </fieldset>
      <fieldset>

      <label for="">Descrição Do Produto:</label>
        <input type="text" placeholder="Descrição do produto" name="descricao" value="<?php echo $descricao ?>" id="descricao" tabindex="2"  required></input>
      </fieldset>
      <fieldset>

      <label for="">Preço:</label>
        <input placeholder="Preço do produto" type="number" step="0.01" min="1" name="preco" value="<?php echo $preco ?>" id="preco" tabindex="3"  required>
      </fieldset>
      <fieldset>

      <label for="">Desconto:</label>
        <input placeholder="Desconto do produto" type="number" step="0.01" min="0" name="desconto" value="<?php echo $desconto ?>" id="desconto" tabindex="4"  required>
      </fieldset>
      
              <!-- envio do id para a próxima página (hidden) -->
      <input type="hidden" value="<?php echo $_GET["id"]?>" name="id">
      
      <select name="categoriaId" id="categoriaId" required>
        
         <option> Categoria </option>

        <?php

        $stmt = $pdo->prepare("SELECT * FROM CATEGORIA  WHERE CATEGORIA_ATIVO");
        $stmt->execute();

        if($stmt->rowCount() > 0){
        while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
          echo "<option value='{$dados['CATEGORIA_ID']}'>{$dados['CATEGORIA_NOME']}</option>";
        }  
        }

        ?>
      </select>
      <br>
        <input type="submit" value="Enviar"> 
    </form>
   
    
  </div>

</body>
</html>