<?php 
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
            <form  id="formProdutora" action="../../Controller/produtora/salvar.php" method="post"> <br>
                <h1 id="titulo" align="center">Cadastrar Produtora</h1> 
                <label for="nome"><b>Nome:</b></label> 
                <input class="inputForm" name="nome" type="text" placeholder="Nome:" required><br>                    
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Linpar</button>
                    <button class="Botao Botao2" type="submit" >Enviar</button>
                </fieldset>
            </form>
        </section>    
        <footer class="rodape rodapeProdutora">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>