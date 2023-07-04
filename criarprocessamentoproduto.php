<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';

//Captura os valores das variáveis
//Captura os valores das variáveis
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$precoint = intval( $preco );
$desconto = $_POST["desconto"];
$descontoint = intval( $desconto );
$categoriaId = $_POST["categoriaId"];
$idcategoria = intval( $categoriaId );


    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO PRODUTO (PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, CATEGORIA_ID, PRODUTO_ATIVO) 
VALUES('" . $nome . "','" . $descricao . "'," . $precoint . "," . $descontoint . "," . $categoriaId . ", 1)" ;
$cmd = $pdo->prepare($cmdtext);



//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Produto criado com sucesso');window.location
    .href='listarprodutos.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao inserir');window.location
    .href='listarprodutos.php';</script>";
}

?>

