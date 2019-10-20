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
            $planoId = @$_GET['planoId'];
            $sql =  "SELECT * FROM plano WHERE id = '$planoId'";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <section class="menuAdm">
            <section class="divForms">
                <form  id="formPlano" action="../../Controller/plano/update.php" method="POST"> <br>                  
                    <h1 id="titulo" align="center">Alterar plano</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['id']; ?>">
                    <label for="nome"><b>Nome:</b></label> 
                    <input class="inputForm" name="nome" type="text"  required value="<?php echo $item['nome']; ?>">
                    <label for="nome"><b>Código:</b></label> 
                    <input class="inputForm" name="codigo" type="text"  required value="<?php echo $item['codigo']; ?>">
                    <label for="nome"><b>Descrição:</b></label> 
                    <input class="inputForm" name="descricao" type="text"  required value="<?php echo $item['descricao']; ?>">
                    <label for="nome"><b>Valor:</b></label> 
                    <input class="inputForm" name="valor" type="text"  required value="<?php echo $item['valor']; ?>">
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