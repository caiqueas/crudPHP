<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

session_start();

//Captura o post do Usuario
$email = $_POST["email"];
$senha = $_POST["senha"];

//Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo Usuario
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "' AND COALESCE(ADM_ATIVO, 1) = 1")->fetchAll();

//Se o retorno for vazio (0), então a senha ou email estão incorretos
if(count($admin)==0){
           // se nao forem validos
        
        // Direciona para a pagina de login com a mensagem de erro
        header("location:loginadmin.php?msg= USUARIO OU SENHA INCORRETA ");
} else {
         // Se forem validos
    
        // Gera uma marcacao para saber que esta logado
        $_SESSION["logado"] = true;
    
        // Armazena o nome do usuario
        $_SESSION["nome"] = $email;
        
        // Direciona para a pagina do Menu Principal
        header("location:menuadmin.php");
}
?>
