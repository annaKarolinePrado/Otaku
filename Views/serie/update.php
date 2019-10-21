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
            $serieId = @$_GET['serieId'];
            $sql =  "SELECT * FROM serie WHERE id = $serieId";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <section class="menuAdm">
            <section class="divForms">
                <form  id="formPlano" action="../../Controller/serie/update.php" method="POST"> <br>                  
                    <h1 id="titulo" align="center">Alterar série</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">
                    <label for="nome"><b>Nome:</b></label> 
                    <input class="inputForm" name="nome" type="text"  required value="<?php echo $item['NOME']; ?>">
                    <label for="produtoidra"><b>Produtora:</b></label>
                    <select name="produtoraId" id="produtoraId">
                        <?php
                            $sql_produtora = "SELECT ID, NOME FROM PRODUTORA";
                            $query_produtora = mysqli_query($con, $sql_produtora);
                            while ($produtora = mysqli_fetch_array($query_produtora, MYSQLI_ASSOC)) {
                        ?>
                        <option value="<?php echo $produtora['ID']; ?>" <?php echo $produtora['ID'] == $item['PRODUTORAID']?'selected':''; ?>><?php echo $produtora['NOME']; ?></option>
                        <?php
                            }
                        ?>
                    </select><br>
                    <label for="categoria"><b>Categoria:</b></label>
                    <select name="categoriaId" id="categoriaId">
                        <?php
                            $sql_categoria = "SELECT ID, NOME FROM CATEGORIA";
                            $query_categoria = mysqli_query($con, $sql_categoria);
                            while ($categoria = mysqli_fetch_array($query_categoria, MYSQLI_ASSOC)) {
                        ?>
                        <option value="<?php echo $categoria['ID']; ?>" <?php echo $categoria['ID'] == $item['CATEGORIAID']?'selected':''; ?>><?php echo $categoria['NOME']; ?></option>
                        <?php
                            }
                        ?>
                    </select><br>             
                        <label for="gostei"><b>Like:</b></label>
                        <select name="gosteiId" id="gosteiId">                        
                        <option value="1" <?php echo $item['GOSTEIID'] == 1?'selected':''; ?>>Sim</option>
                        <option value="2" <?php echo $item['GOSTEIID'] == 2?'selected':''; ?>>Não</option>                        
                    </select><br><br>            
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