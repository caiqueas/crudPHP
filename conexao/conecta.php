<?php



$mysqlhostname = "HostDoSeuBanco";

$mysqlport = "3306";

$mysqlusername = "Username";

$mysqlpassword = "SuaSenha";

$mysqldatabase = "NomeDoBanco";



//Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)

$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;

$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);



$pdo->lastInsertId()



?>



