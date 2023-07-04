<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

// Captura os valores das variaveis
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$precoint = floatval( $preco );
$desconto = $_POST["desconto"];
$descontoint = floatval( $desconto );
$categoriaId = $_POST["categoriaId"];
$idcategoria = intval( $categoriaId);
$id = $_POST["id"];


if($idcategoria == 0){

    echo "<script language='javascript' type='text/javascript'>
    alert('ERRO: Informe uma categoria');window.location
    .href='listarprodutos.php';</script>";


}

$cmdtext = "UPDATE PRODUTO SET PRODUTO_NOME='" . $nome . "', PRODUTO_DESC='" . $descricao . "', PRODUTO_PRECO=" . $precoint . ",
PRODUTO_DESCONTO=" . $descontoint . ", CATEGORIA_ID=" . $categoriaId . " WHERE PRODUTO_ID=" .$id;
$cmd = $pdo->prepare($cmdtext);


//var_dump($id);


//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Produto atualizada com sucesso');window.location
    .href='listarprodutos.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='listarprodutos.php';</script>";
}

?>