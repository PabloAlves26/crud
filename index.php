<!-- @autor: Luciano Oliver
Criado em: 20/11/2021
Tipo: CRUD PHP
Linguagens usadas: HTML, CSS, JS e PHP
Ferramentas: Framework Materialize -->

<?php 

    //Conexão - Inclui o arquivo db_connect.php
    include_once 'php_action/conexao_com_banco.php';
    //Mensagem - Inclui o arquivo mensagem.php
    include_once 'includes/mensagem.php';
    /*Código para adicionar titulo dinãmicamente atraves de uma variavel */
    $cabecalho_title = "Sistema de Cadastro de Clientes";
     //Header - Inclui o header ( cabeçalho no documento atual)
    include_once 'includes/header.php';

?>

<!--Inicio do body.-->
    <div class="row"> <!--Div Classe Linhas-->
    <div class="col s12 m6 push-m3"><!--Especifica o numero de colunas de acorddo com o tamanho da tela-->
        <h3 class="light">Clientes Cadastrados</h3><!--Texto Titulo H3-->
        <table class="hoghtlight striped"><!--Classe do FW que adiciona efeito zebrado na lista-->
            <thead><!--Inicio cabeçalho tabela-->
                <tr><!--Define uma linha com conteudos th-->
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                    <th>Idade</th>
                </tr>
            </thead><!--Fim cabeçalho da tabela-->

            <tbody><!--Inicio corpo tabela-->

                <?php /*Inicio codigo php que trata o caso de não haver elementos noBD*/
                    $sql = "SELECT*FROM clientes";/*Seleciona a tabela no BD  e salva na var $sql*/
                    $resultado = mysqli_query($conexao, $sql);/*Adiciona a conexão a var $resultado*/

                    if (mysqli_num_rows($resultado) > 0):/*Se o resultado for > que 0 o wile é exec*/

                    while ($dados = mysqli_fetch_array($resultado)):
                ?>

                <tr><!--Linha com conteudo adicionado dinamicamente vidas do BD-->
                    <td><?php echo $dados['nome']; ?></td><!--Imprime nome salvo na var $dado-->
                    <td><?php echo $dados['sobrenome']; ?></td><!--Imprime sobrenome salvo na var $dado-->
                    <td><?php echo $dados['email']; ?></td><!--Imprime email salvo na var $dado-->
                    <td><?php echo $dados['idade']; ?></td><!--Imprime idade salvo na var $dado-->

                    <!--Botão Editar com classe do FW e comando para selecionar o  id salvo da var $dados-->
                    <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <!--Botão Deletar com a classe do FW e o comando para selecionar o id salvo na var $dados-->
                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                </tr>
                
                <!-- Janela Modal do FW -->
                <div id="modal<?php echo $dados['id']; ?>" class="modal">
                    <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Têm certeza que deseja excluir esse cliente?</p>
                </div>
                <div class="modal-footer">
                <!--Fim Janela Model-->

                <!--form com input do tipo hidden com o id do dado a ser excluido-->
                <form action="php_action/deletar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <button type="dubmit" name="btn-deletar" class="btn red">Sim, quero deletar.</button>
            
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                </form>
                <!--Fim form com inpult oculto-->
            </div><!--Fim div que especifica o numero de colunas de acordo com o tam da tela-->
        </div><!--Fim div class linhas-->
            <!--Código que trata o caso de naõ haver dados no BD-->
            <?php endwhile;
            else: ?>
                <tr>
                    <td>Não ha dados</td>
                    <td>Não ha dados</td>
                    <td>Bão ha dados</td>
                    <td>Não ha dados</td>
                </tr>
            <?php endif; ?>
             <!--Fim Código que trata o caso de naõ haver dados no BD-->
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar Cliente</a>
        </div><!--Fim div tabela-->
    </div><!--Fim div classe linhas-->

<?php /*Adiciona o footer ao documento*/
    include_once 'includes/footer.php';
?>
<!-- Fim body  -->