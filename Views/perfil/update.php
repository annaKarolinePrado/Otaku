<?php
	session_start();
	include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/padrao.css"> 
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';
                @$status = $_GET['status'];
                if($status  == 1){
                    echo "<p style='width:100%; float:left; text-align:center;'>
                    Atualiado com sucesso.</p>";
                }
            ?>	

        </header>
        <?php
            $perfilId = @$_GET['perfilId'];
            $sql =  "SELECT * FROM perfil WHERE id = '$perfilId'";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>

        <section class="menuAdm">
            <section id="perfil">
                <form  id="formPerfil" action="../../Controller/perfil/update.php" method="POST">                    
                    <h1 id="titulo">Alterar perfil</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['id']; ?>">
                    <input class="inputForm" name="nivel" type="text"  required value="<?php echo $item['nivel']; ?>">            
                    <input class="inputForm" name="descricao" type="text"  required value="<?php echo $item['descricao']; ?>"> 
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Limpar</button>
                        <button class="Botao Botao2" type="submit" >Alterar</button>
                        <a href=""></a>
                    </fieldset>
                </form>
            </section>        
        </section>   
    </body>
    <footer class="rodape">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>
<?php
	mysqli_close($con);
?>