<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
    $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome =filter_input (INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $idade = filter_input (INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    $id = mysqli_escape_string($connect, $_POST['id']);

   $sql = "UPDATE clientes SET nome='$nome', sobrenome='$sobrenome', email='$email', idade='$idade' WHERE id='$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com Sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('Location: ../index.php');
    endif;
endif;

?>