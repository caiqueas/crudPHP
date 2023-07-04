<?php
//Dados para conexao ao MySQL → MySQL
require_once 'conexao/conecta.php';


//Captura os valores das variáveis
$qtd = $_POST["qtd"];
$qtdconvert = intval($qtd);

$idproduto = $_POST["IdProduto"];
$idconvert = intval($idproduto);
    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO PRODUTO_ESTOQUE (PRODUTO_ID, PRODUTO_QTD) VALUES(" . $idconvert . "," . $qtdconvert . ")" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Estoque criado com sucesso');window.location
    .href='listarestoque.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao inserir');window.location
    .href='listarestoque.php';</script>";
}
?>