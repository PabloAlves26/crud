Codigo com a conexão com BD Remoto
Deve ser incrementado no arquivo de conexão db_connect.php ao 
pôr o site no servidor remoto

<?php
//Conexão co o banco de dados
$servername = "sql104.epizy.com";
$username = "epiz_30556413";
$password = "ikhMVh9hbl";
$db_name ="epiz_30556413_crud";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");