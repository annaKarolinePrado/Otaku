<?php 
    include('../../conexao/validar.php');
    include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css"> 
    </head>
    <header id="topo">
        <?php include '../cabecalho.php';             
            @$status = $_GET['status'];
            if($status  == 1){
                echo "<p style='width:100%; float:left; text-align:center;'>
                Cadastrado com sucesso.</p>";
            }
        ?>			
    </header>
    <body>      
        <div class="divForms" > 
            <section id="plano">
                <form  id="formplano" action="listar.php" method="post"><br>    
                    <h1 id="titulo" align="center">Pesquisar filme</h1>        
                    <label for="descricao"><b>Duração:</b></label>
                    <input class="inputForm" name="duracao" type="text" placeholder="" required><br>
                    
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Linpar</button>
                        <button class="Botao Botao2" type="submit" >Pesquisar</button>
                        
                    </fieldset>
                </form>
            </section> 
        </div>   
        <footer class="rodape">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>