<?php
//Conexão co o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name ="crud";

$conexao = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($conexao, "utf8");

//Verificar conexão
if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;
?>