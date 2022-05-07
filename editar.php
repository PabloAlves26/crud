<?php 
//Conexão - Inclui a conexão com o banco de dados
    include_once 'php_action/conexao_com_banco.php';
//Header - Inclui o cabaçalho a pagina atual

/*Código para adicionar titulo dinãmicamente atraves de uma variavel */
    $cabecalho_title = "Edidar Dados do Cliente"; 
/*Código para icluir o cabeçalho a pagina atual */
    include_once 'includes/header.php';
//Select
if (isset($_GET['id'])): /*Script que verifica se a conexão foi bém feita. Se sim*/
    $id = mysqli_escape_string($conexao, $_GET['id']);  /*mostra o resultado dos dados no banco */

    $sql = "SELECT*FROM clientes WHERE id='$id'"; /*Comando sql para selecionar tos os id dobanco*/
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h3>
        <form action="php_action/atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" required>
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>" required>
                <label for="sobrenome">Sobrenome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>" required>
                 <label for="email">E-mail</label>
            </div>

            <div class="input-field col s12">
                <input type="number" name="idade" id="idade" value="<?php echo $dados['idade']; ?>" required>
                <label for="idade">Idade</label>
            </div>

                <button type="submit" name="btn-editar" class="btn">Atualizar</button>
               <a href="index.php" class="btn green">Lista de Clientes</a>
            </div>
        </form>
    </div>
</div>

<?php
    include_once("includes/footer.php");
?>