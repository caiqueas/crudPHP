<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar categorias</title>
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

        <h1>Atualizar categoria</h1>

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

// Coleta os dados do Administrador
$id = $_GET["id"];

// Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo usuario
$admin = $pdo->query("SELECT * FROM CATEGORIA WHERE CATEGORIA_ID=" . $id)->fetch() ;

// Se o retorna for vazio (0), então a senha ou email estão incorretos
$nome = $admin["CATEGORIA_NOME"];
$descricao = $admin["CATEGORIA_DESC"];
?>    

<div class="container">
<Form id="contact" Action="atualizarcategoria.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <br>
    Nome da categoria : 
    <input placeholder="Nome da categoria" type="text" name="nome" value="<?php echo $nome ?>" required>
    <br>
    Descrição : 
    <input placeholder="Descrição" type="text" name="descricao" value="<?php echo $descricao ?>" required>
    <br>
    <input type="submit" value="Enviar"> 
</Form>
</div>

</body>
</html>