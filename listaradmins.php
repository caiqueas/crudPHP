<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de administradores</title>
    <link rel="shortcut icon" href="imagens/Alpha_Go_2_2[1406].png" /> 
    <link rel="stylesheet" href="styleadmin.css">
</head>

<body>
enu-h">
        <ul>
        <a href="menuadmin.php">


<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="color:white ;">
<path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />

</svg>
</a>
</li>
            <li>
                <a href="cadastraradmin.php">
                    Cadastrar administradores
                </a>
            </li>

            <li><a href="listarcategorias.php">Categorias</a></li>
            
            <li><a href="listarprodutos.php">Produtos</a></li>

            <li><a href="listarimagem.php">Cadastrar imagem</a></li>

            <li><a href="listarestoque.php">Estoque</a></li>
            
            <li><a href="logout.php"  style="color:yellow ;">Sair</a></li>
        </ul>
    </nav>

        <h1>Listar os Administradores</h1>
        <br>
<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR");
?>      
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
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
                    echo $linha["ADM_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["ADM_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["ADM_EMAIL"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["ADM_SENHA"];
                ?>
            </td>    
            <td>
                <a href="atualizarform.php?id=<?php echo $linha["ADM_ID"] ?>">Atualizar</a>
            </td>
            <td>
                <a href="excluirform.php?id=<?php echo $linha["ADM_ID"] ?>">Ativar/Desativar</a>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
   
    </body>
    </html>