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
            $contaId = @$_GET['contaId'];
            $sql =  "SELECT *   FROM `conta`  where conta.id = $contaId";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $plano = $item['PLANO_ID'];            
            $cartao = $item['CARTAO_ID'];            
        ?>
        <section class="menuAdm"> 
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/conta/update.php" method="POST">                    
                    <h1 id="titulo">Alterar Conta</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">


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
    <footer class="rodape rodapePerfil">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>
<?php
	mysqli_close($con);
?>