<?php

$mysqlhostname = "179.188.16.17";
$mysqlport = "3306";
$mysqlusername = "webcamadas";
$mysqlpassword = "Locaweb@102030";
$mysqldatabase = "webcamadas";

//Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

$pdo->lastInsertId()

?>

