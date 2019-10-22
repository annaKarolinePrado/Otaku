<?php 
    include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css">
    </head>
    <header id="topo">
        <?php include '../cabecalho.php';?>			
    </header>
    <body>	
        <?php             
            @$status = $_GET['status'];
            if($status  == 1){
                echo "<p style='width:100%; float:left; text-align:center;'>
                Cadastrado com sucesso.</p>";
            }
        ?>	      
        <section class="divForms">
            <form  id="formusuario" action="../../Controller/temporada/salvar.php" method="post"><br>
                <h1 id="titulo" align="center">Cadastrar temporada</h1> 
            <div class="container">   
                <label for="nome"><b>Nome:</b></label>                
                <input class="inputForm" name="nome" type="text" placeholder="Nome:" required><br>  
                <label for="login"><b>Sequencial:</b></label>                  
                <input class="inputForm" name="sequencial" type="text" placeholder="Sequencial:" required><br>   
                <label for="id">Serie:</label>
                <select name="serieId" id="serieId">
                    <?php
                        $sql = "SELECT id, nome FROM serie";
                        $query = mysqli_query($con, $sql);
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                    <?php
                        }
                    ?>
                </select><br><br>                   
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Limpar</button>
                    <button class="Botao Botao2" type="submit" >Enviar</button>
                </fieldset>
                    </div>
            </form>
        </section>    
        <footer class="rodape rodapeUsuario">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>
<?php
	mysqli_close($con);
?>