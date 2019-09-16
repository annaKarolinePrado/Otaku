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
        <section class="divForms"><br>
            <h1 align="center">Cadastro de Perfil</h1><br>
            <form  id="formPerfil" action="../../Controller/perfil/salvar.php" method="post">           
                <input class="inputForm" name="numero" type="text" placeholder="Numero:" required><br>                     
                <input class="inputForm" name="descricao" type="text" placeholder="Descrição:" required><br>                     
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Limpar</button>
                    <button class="Botao Botao2" type="submit" >Enviar</button>
                </fieldset>
            </form>
        </section>    
        <footer class="rodape rodapePerfil">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>