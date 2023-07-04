<html><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de estoque</title>
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
            
            <li><a href="logout.php" style="color:yellow">Sair</a></li>
        </ul>
    </nav>

<!--Lista de administradores-->

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

?>

<!-- Formulário  -->

<div class="container">  
    <form id="contact" action="criarprocessamentoestoque.php" method="POST">
      <h3 style="color: brown;">Cadastro de estoque</h3>

      <select name="IdProduto" id="IdProduto" required>
        <option> Produto </option>

        <?php

        $stmt = $pdo->prepare("SELECT * FROM PRODUTO WHERE PRODUTO_ATIVO");
        $stmt->execute();

        if($stmt->rowCount() > 0){
        while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
          echo "<option value='{$dados['PRODUTO_ID']}'>{$dados['PRODUTO_NOME']}</option>";
        }  
        }

        ?>
      </select>

      <fieldset>
        <input  placeholder="Quantidade" type="number" min="0" name="qtd" id="qtd" tabindex="2" required style="border-radius: 18px">
      </fieldset>

      <fieldset>
        <button value="Cadastrar" id="cadastrar" name="cadastrar" style="border-radius: 18px">Cadastrar</button>
      </fieldset>
    </form>
</div>


</body>
</html>