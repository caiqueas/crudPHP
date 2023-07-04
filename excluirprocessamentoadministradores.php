<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

// Captura os valores das variaveis
$ativo = $_POST["ativo"];
$id = $_POST["id"];

// Monta o comando de inserção
$cmdtext = "UPDATE ADMINISTRADOR SET ADM_ATIVO='" . $ativo . "' WHERE ADM_ID=" .$id;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Administrador atualizado com sucesso');window.location
    .href='administradores.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='administradores.php';</script>";
}
?>

