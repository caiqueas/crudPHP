<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

//Captura os valores das variáveis
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO ADMINISTRADOR (ADM_NOME, ADM_EMAIL, ADM_SENHA) VALUES('" . $nome . "','" . $email . "','" .$senha . "')" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Administrador criado com sucesso');window.location
    .href='menuadmin.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao criar o administrador');window.location
    .href='menuadmin.php';</script>";
}
?>
