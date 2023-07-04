<html><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
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
        <a href="menuadmin.php">


<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="color:white ;">
<path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />

</svg>
</a>
</li>
            <li>
                <a href="administradores.php">
                    Administradores
                </a>
            </li>

            <li><a href="listarcategorias.php">Categorias</a></li>
            
            <li><a href="listarprodutos.php">Produtos</a></li>

            <li><a href="listarimagem.php">Cadastrar imagem</a></li>

            <li><a href="listarestoque.php">Estoque</a></li>
            
            <li><a href="logout.php"  style="color:yellow ;">Sair</a></li>
        </ul>
    </nav>


<!-- Formulário  -->

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM PRODUTO");
?>   

<div class="container">  
    <form id="contact" action="criarprocessamentoproduto.php" method="POST">
    <h3 style="color: brown;">Cadastro de Produto</h3>
      <h4 style="color:brown ;">Cadastre novos produtos através do formulário abaixo</h4>
      <fieldset>
        <input placeholder="Nome do produto" type="text" name="nome" id="nome" tabindex="1" required style="border-radius: 18px">
      </fieldset>
      <fieldset>
        <textarea placeholder="Descrição do produto" name="descricao" id="descricao" tabindex="2" required style="border-radius: 18px"></textarea>
      </fieldset>
      <fieldset>
        <input placeholder="Preço do produto" type="number" step="0.01" min="1" name="preco" id="preco" tabindex="3" required style="border-radius: 18px">
      </fieldset>
      <fieldset>
        <input placeholder="Desconto do produto" type="number" step="0.01" min="0.01" name="desconto" id="desconto" tabindex="4" required style="border-radius: 18px">
      </fieldset>
      <select name="categoriaId" id="categoriaId" required style="border-radius: 18px">
        <option> Categoria </option>

        <?php

        $stmt = $pdo->prepare("SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO");
        $stmt->execute();

        if($stmt->rowCount() > 0){
        while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
          echo "<option value='{$dados['CATEGORIA_ID']}'>{$dados['CATEGORIA_NOME']}</option>";
        }
        }

        ?>
      </select>
      <fieldset>
        <button value="Cadastrar" id="cadastrar" name="cadastrar">Cadastrar</button>
      </fieldset>
    </form>
   
    
  </div>


</body>
</html>