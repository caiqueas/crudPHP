<?php

require_once 'conexao/conecta.php';


$id = $_GET["id"];
$ordem = $_POST["IMAGEM_ORDEM"];
$produto_id = $_POST["PRODUTO_ID"];

var_dump($id);

// Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo usuario
$admin = $pdo->query("SELECT * FROM PRODUTO_IMAGEM WHERE IMAGEM_ID=" . $id)->fetch();




// Monta o comando de inserção
$cmdtext = "UPDATE PRODUTO_IMAGEM SET IMAGEM_ID='" . $id . "', IMAGEM_ORDEM='" . $ordem . "', PRODUTO_ID=" . $produto_id . ",
IMAGEM_URL=" . $link;
$cmd = $pdo->prepare($cmdtext);

//var_dump($id);


//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Imagem atualizada com sucesso');window.location
    .href='listarprodutos.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='listarprodutos.php';</script>";
}

?>

<!-- FALTA ENVIAR O PRODUTO ID PARA O UPDATE -->

<!-- Seguir com atualização, inserindo o produto_id como opção para o usuário atualizar tbm -->