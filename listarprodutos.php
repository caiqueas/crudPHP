<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
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
            
            <li><a href="logout.php" style="color:yellow ;">Sair</a></li>
        </ul>
    </nav>

        <h1 style="color: brown;">Lista de produtos</h1>
        <button type="button" class="btn btn-warning listaAdmin" onclick="location.href='produtosadmin.php'" style="border-radius: 18px"><b>Novo<b></button>

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT
P.PRODUTO_ID,
P.PRODUTO_NOME,
P.PRODUTO_DESC,
P.PRODUTO_PRECO,
P.PRODUTO_DESCONTO,
P.PRODUTO_ATIVO,
CAT.CATEGORIA_NOME
FROM PRODUTO as P
LEFT JOIN CATEGORIA AS CAT 
ON CAT.CATEGORIA_ID = P.CATEGORIA_ID");
?>    

<div class="container">
<table class="table"style="background-color:brown;color: white">
        <tr>
            <th>Id</th>
            <th>Nome do produto</th>
            <th>Descrição</th> 
            <th>Preço</th> 
            <th>Desconto</th>
            <th>Valor Final</th>
            <th>Categoria</th> 
            <th>Ativo</th>   
            <th>Atualização</th>
            <th>Ativar/Desativar</th>          
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["PRODUTO_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_DESC"];
                ?>
            </td>
            <td>
                <?php
                    echo "R$" . $linha["PRODUTO_PRECO"];
                ?>
            </td>
            <td>
                <?php
                    echo "R$" . $linha["PRODUTO_DESCONTO"];
                ?>
            </td>
            <td>
                <?php
                    $conta = $linha["PRODUTO_PRECO"] - $linha["PRODUTO_DESCONTO"];
                    $final = floatval($conta);                    
                     echo "R$" . $final;
                ?>
            </td>
            <td>
                <?php
                    echo $linha["CATEGORIA_NOME"];
                ?>
            </td>
            <td>
                <?php
                    $ativo =  $linha["PRODUTO_ATIVO"];

                    if($ativo == 1){
                        echo"Sim";
                    }else{
                        echo"Não";
                    }
                ?>
            </td>          
            <td>
           <a href="atualizarformproduto.php?id=<?php echo $linha["PRODUTO_ID"] ?>"><button  class="btn btn-warning">Atualizar</button>
            </td>
            <td>
           <a href="excluirproduto.php?id=<?php echo $linha["PRODUTO_ID"] ?>"> <button  class="btn btn-warning">Ativar/Desativar</button>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>

    </div>

   
    </body>
    </html>