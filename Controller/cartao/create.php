<?php 
    include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css">
    </head>
    <body>
        <header id="topo">
            <nav class="menu">    
                <ul>
                    <li><a class="index.php" href="http://localhost/Otaku">Início</a></li>
                    <?php
                        session_start();
                        if(@$_SESSION['usuario'] > 0) {                
                    ?>
                    <li><a class="perfil" href="http://localhost/Otaku/views/perfil/index.php">Perfil</a></li>
                    <li><a class="plano" href="http://localhost/Otaku/views/plano/index.php">Plano</a></li>
                    <li><a class="produtora" href="http://localhost/Otaku/views/produtora/index.php">Produtora</a></li>
                    <li><a class="usuario" href="http://localhost/Otaku/views/usuario/index.php">Usuario</a></li>
                    <?php
                        }
                    ?>
                    <li><a class="cadastreSe" href="http://localhost/Otaku/views/usuario/create.php">Cadastre-se</a></li>     
                    <li><a class="sair" href="http://localhost/Otaku/views/admin/sair.php">Sair</a></li>
                </ul>
            </nav>	
            <?php             
                @$status = $_GET['status'];
                if($status  == 1){
                    echo "<p style='width:100%; float:left; text-align:center;'>
                    Cadastrado com sucesso.</p>";
                }
            ?>			
        </header>        
        <section class="divForms">
            <form  id="formusuario" action="../../Controller/cartao/save.php" method="post"> 
            <div class="container">
                <label for="nome"><b>Cadastro de cartão:</b></label>   <br>    <br>
                <label for="titular"><b>Nome do titular:</b></label>                
                <input class="inputForm" name="titular" type="text" placeholder="Nome:" required><br>  
                <label for="login"><b>Numero do cartão:</b></label>                  
                <input class="inputForm" name="numero" type="text" placeholder="Numero do cartão:" required><br>   
                <label for="chaveSeguranc"><b>Chave de segurança:</b></label>                 
                <input class="inputForm" name="chaveSeguranca" type="text" placeholder="Chave de segurança:" required><br>
                <label for="id">Usuário:</label>
                <select name="usuarioId" id="usuarioId">
                    <?php
                        $sql = "SELECT id, nome FROM usuario";
                        $query = mysqli_query($con, $sql);
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                    <?php
                        }
                    ?>
                </select><br><br>                   
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Linpar</button>
                    <button class="Botao Botao2" type="submit" >Enviar</button>
                </fieldset>
                    </div>
            </form>
        </section>    
        <footer class="rodape">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>
<?php
	mysqli_close($con);
?>