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
            $planoId = @$_GET['planoId'];
            $sql =  "SELECT * FROM plano WHERE id = '$planoId'";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>

        <section class="menuAdm">
            <section id="plano">
                <form  id="formPlano" action="../../Controller/plano/update.php" method="POST">                    
                    <h1 id="titulo">Alterar plano</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['id']; ?>">
                    <input class="inputForm" name="nome" type="text"  required value="<?php echo $item['nome']; ?>">
                    <input class="inputForm" name="codigo" type="text"  required value="<?php echo $item['codigo']; ?>">
                    <input class="inputForm" name="descricao" type="text"  required value="<?php echo $item['descricao']; ?>">
                    <input class="inputForm" name="valor" type="text"  required value="<?php echo $item['valor']; ?>">
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