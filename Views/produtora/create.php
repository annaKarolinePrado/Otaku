<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
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
        <section id="produtora">
            <form  id="formProdutora" action="../../Controller/produtora/salvar.php" method="post">           
                <input class="inputForm" name="nome" type="text" placeholder="Nome:" required><br>                    
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Linpar</button>
                    <button class="Botao Botao2" type="submit" >Enviar</button>
                </fieldset>
            </form>
        </section>    
        <footer class="rodape">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>