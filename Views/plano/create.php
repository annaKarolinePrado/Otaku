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
        <div class="divForms" > 
            <section id="plano">
                <form  id="formplano" action="../../Controller/plano/salvar.php" method="post"><br>    
                    <h1 id="titulo" align="center">Cadastrar plano</h1>        
                    <label for="nome"><b>Nome:</b></label>
                    <input class="inputForm" name="nome" type="text" placeholder="Nome:" required><br>
                    <label for="nome"><b>Código:</b></label>                    
                    <input class="inputForm" name="codigo" type="text" placeholder="Código:" required><br> 
                    <label for="nome"><b>Descrição:</b></label>                   
                    <input class="inputForm" name="descricao" type="text" placeholder="Descricao:" required><br>
                    <label for="nome"><b>Valor:</b></label>                    
                    <input class="inputForm" name="valor" type="text" placeholder="Valor:" required><br>                    
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Linpar</button>
                        <button class="Botao Botao2" type="submit" >Enviar</button>
                    </fieldset>
                </form>
            </section> 
        </div>   
        <footer class="rodape">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>