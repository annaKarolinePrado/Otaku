<?php
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css"> 
    </head>
    <header id="topo">
        <?php include '../cabecalho.php';
            @$status = $_GET['status'];
            if($status  == 1){
                echo "<p style='width:100%; float:left; text-align:center;'>
                Atualiado com sucesso.</p>";
            }
        ?>
    </header>
    <body>
        <?php
            $temporadaId = @$_GET['temporadaId'];
            $sql =  "SELECT * FROM temporada WHERE id = '$temporadaId'";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <section class="menuAdm"> 
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/temporada/update.php" method="POST"><br>                    
                    <h1 id="titulo" align="center">Alterar temporada</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">
                    <label for="nome"><b>Nome:</b></label> 
                    <input class="inputForm" name="nome" type="text"  required value="<?php echo $item['NOME']; ?>">
                    <label for="login"><b>Sequencial:</b></label> 
                    <input class="inputForm" name="sequencial" type="text"  required value="<?php echo $item['SEQUENCIAL']; ?>">
                    <label for="serieId"><b>Série:</b></label>
                    <select name="serieId" id=""> 
                        <?php
                            $sql =  "SELECT * FROM serie";
                            $query = mysqli_query($con, $sql);
                            while ($itemSerie = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        ?>    
                        <option value="<?php echo $itemSerie['ID']?>" <?php echo $itemSerie['ID']== $item['SERIEID']?'selected':"";?> ?>
                            <?php echo $itemSerie['NOME']?>
                        </option>
                        <?php 
                            }
                        ?>                        
                    </select>
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