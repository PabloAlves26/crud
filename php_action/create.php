<?php
//Sessão
session_start();
//Conexão
require_once 'conexao_com_banco.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome =filter_input (INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $idade = filter_input (INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) 
        VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    if(mysqli_query($conexao, $sql)):
        $_SESSION['mensagem'] = "<center>Cadastrado com Sucesso!</center>";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "<center>Erro ao Cadastrar!</center>";
        header('Location: ../index.php');
    endif;
endif;

?>