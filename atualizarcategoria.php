<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

// Captura os valores das variaveis
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$id = $_POST["id"];

// Monta o comando de inserção
$cmdtext = "UPDATE CATEGORIA SET CATEGORIA_NOME='" . $nome . "', CATEGORIA_DESC='" . $descricao . "' WHERE CATEGORIA_ID=" .$id;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Categoria atualizada com sucesso');window.location
    .href='listarcategorias.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='listarcategorias.php';</script>";
}
?>
