<?php 
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css">
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php'; 
            
                @$status = $_GET['status'];
                if($status  == 1){
                    echo "<p style='width:100%; float:left; text-align:center;'>
                    Cadastrado com sucesso.</p>";
                }
            ?>			
        </header>        
        <section class="divForms">
            <form  id="formusuario" action="../../Controller/usuario/salvar.php" method="post"> 
            <div class="container">   
                <label for="nome"><b>Nome:</b></label>                
                <input class="inputForm" name="nome" type="text" placeholder="Nome:" required><br>  
                <label for="login"><b>Login:</b></label>                  
                <input class="inputForm" name="login" type="text" placeholder="Login:" required><br>   
                <label for="senha"><b>Senha:</b></label>                 
                <input class="inputForm" name="senha" type="password" placeholder="Senha:" required><br>
                <label for="id">Perfil:</label>
                <select name="perfilId" id="perfilId">
                    <?php
                        $sql = "SELECT id, descricao FROM perfil";
                        $query = mysqli_query($con, $sql);
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['descricao']; ?></option>
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