<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

//Captura os valores das variáveis
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC) VALUES('" . $nome . "','" . $descricao . "')" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Categoria criada com sucesso');window.location
    .href='listarcategorias.php';</script>";
} else {
    echo "Ocorreu um erro ao inserir";
}
?>
