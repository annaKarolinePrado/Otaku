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
            $produtoraId = @$_GET['produtoraId'];
            $sql =  "SELECT * FROM produtora WHERE id = '$produtoraId'";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>      
        <section class="menuAdm">
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/produtora/update.php" method="POST"><br>                   
                    <h1 id="titulo" align="center">Alterar produtora</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['id']; ?>">
                    <label for="nome"><b>Nome:</b></label> 
                    <input class="inputForm" name="nome" type="text"  required value="<?php echo $item['nome']; ?>">
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