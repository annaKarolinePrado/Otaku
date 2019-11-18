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
            $filmeId = @$_GET['filmeId'];
            $sql =  "SELECT *   FROM `filme`  where filme.id = $filmeId";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $produtora = $item['PRODUTORAID'];            
            $categoria = $item['CATEGORIAID']; 
            $like = $item['GOSTEI_ID'];            
        ?>
        <section class="menuAdm">
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/filme/update.php" method="POST">                    
                    <h1 id="titulo">Alterar Conta</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">
                    <label for="nome"><b>Nome:</b></label>                
                    <input class="inputForm" name="nome" type="text" placeholder="Nome:" required><br>   

                    <select name="planoId" id=""> 
                        <?php
                            $sqlPlano =  "SELECT * FROM plano";
                            $queryPlano = mysqli_query($con, $sqlPlano);
                            while ($itemPlano  = mysqli_fetch_array($queryPlano, MYSQLI_ASSOC)){
                        ?>
                        <option value="<?php echo $itemPlano['id']?>" <?php echo $itemPlano['id']== $plano?'selected':"";?> ?>
                            <?php echo $itemPlano['nome']?>
                        </option>
                        <?php 
                            }
                        ?>                        
                    </select> 

                    <select name="cartaoId" id=""> 
                        <?php
                            $sqlCartao =  "SELECT * FROM cartao";
                            $queryCartao = mysqli_query($con, $sqlCartao);
                            while ($itemCartao = mysqli_fetch_array($queryCartao, MYSQLI_ASSOC)){
                        ?>
                        <option value="<?php echo $itemCartao['id']?>" <?php echo $itemCartao['id']==$cartao?'selected':"";?> ?>
                            <?php echo $itemCartao['titular']?>
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