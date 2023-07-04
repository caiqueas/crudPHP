<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';


// Captura os valores das variaveis
$qtd = $_POST["qtd"];
$qtdconvert = intval($qtd);
$IdProduto = $_POST["IdProduto"];
$IdProdutoConvert = intval($IdProduto);


// Monta o comando de inserção
$cmdtext = "UPDATE PRODUTO_ESTOQUE SET PRODUTO_ID=" . $IdProdutoConvert . ", PRODUTO_QTD=" . $qtdconvert . " WHERE PRODUTO_ID=" .$IdProdutoConvert;
$cmd = $pdo->prepare($cmdtext);

//var_dump($qtdconvert);
//var_dump($IdProdutoConvert);


//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Estoque atualizado com sucesso');window.location
    .href='listarestoque.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='listarestoque.php';</script>";
}

?>