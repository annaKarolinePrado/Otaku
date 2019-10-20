<?php 
    include('../../conexao/validar.php');
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
            if($status  == 3){
                echo "<p style='width:100%; float:left; text-align:center;'>
                Não foi possível salvar a imagem.</p>";
            }
        ?>			
    </header>
    <body>
                
        <section class="divForms"><br>
            <h1 align="center">Cadastro de imagem de perfil</h1><br>
            <form  id="formImagemPerfil" action="../../Controller/perfil/imagem.php" method="post" enctype="multipart/form-data">           
                <label for="imagem">Imagem</label><br>
                <input class="inputForm" type="file" name="imagem" id="imagem"><br><br>                     
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