<?php
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';
                @$status = $_GET['status'];
                if($status  == 1){
                    echo "<p style='width:100%; float:left; text-align:center;'>
                    Atualizado com sucesso.</p>";
                }
            ?>	

        </header>
        <?php
            $id = @$_GET['id'];
            $sql =  "SELECT * FROM cartao WHERE id = '$id'";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>

        <section class="menuAdm">
            <section id="usuario">
                <form  id="formPerfil" action="../../Controller/cartao/update.php" method="POST">                    
                    <h1 id="titulo">Alterar cartão</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['id']; ?>">
                    <h1 id="titulo">Titular</h1>  
                    <input class="inputForm" name="titular" type="text"  required value="<?php echo $item['titular']; ?>">
                    <h1 id="titulo">Número cartão</h1>  
                    <input class="inputForm" name="numero" type="text"  required value="<?php echo $item['numero']; ?>">
                    <h1 id="titulo">Chave de segurança</h1>  
                    <input class="inputForm" name="chaveSeguranca" type="text"  required value="<?php echo $item['chaveSeguranca']; ?>">
                    
                    <input class="inputForm" name="perfilId" type="text"  required value="<?php echo $item['id']; ?>">
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