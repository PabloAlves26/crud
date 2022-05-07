<?php
//Sessão
session_start();
//Conexão
require_once 'conexao_com_banco.php';

    if(isset($_POST['btn-deletar'])):

    $id = mysqli_escape_string($conexao, $_POST['id']);

    $sql = "DELETE FROM clientes WHERE id='$id'";

        if(mysqli_query($conexao, $sql)):
            $_SESSION['mensagem'] = "Deletado com Sucesso!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Erro ao Deletar!";
            header('Location: ../index.php');
        endif;
    endif;

?>