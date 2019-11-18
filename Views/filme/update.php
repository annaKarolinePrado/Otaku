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
        ?>
        <section class="menuAdm">
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/filme/update.php" method="POST">                    
                    <h1 id="titulo">Alterar Conta</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">
                    <label for="nome"><b>Nome:</b></label>                
                    <input class="inputForm" name="nome" type="text" placeholder="Nome:" required value="<?php echo $item['NOME']; ?>"><br>   
                    <input class="inputForm" name="duracao" type="text" placeholder="DURACAO:" required value="<?php echo $item['DURACAO']; ?>"><br>   
                    <input class="inputForm" name="lancamentoDate" type="text" placeholder="lançamento:" required value="<?php echo $item['LANCAMENTODATE']; ?>"><br>   

                    <select name="produtoraId" id=""> 
                        <?php
                            $sqlProdutora =  "SELECT * FROM produtora";
                            $queryPlano = mysqli_query($con, $sqlProdutora);
                            while ($itemProdutora  = mysqli_fetch_array($queryPlano, MYSQLI_ASSOC)){
                        ?>
                        <option value="<?php echo $itemProdutora['id']?>" <?php echo $itemProdutora['id']== $produtora?'selected':"";?> ?>
                            <?php echo $itemProdutora['nome']?>
                        </option>
                        <?php 
                            }
                        ?>                        
                    </select> 

                    <select name="categoriaId" id=""> 
                        <?php
                            $sqlCartao =  "SELECT * FROM categoria";
                            $queryCartao = mysqli_query($con, $sqlCartao);
                            while ($itemCategoria = mysqli_fetch_array($queryCartao, MYSQLI_ASSOC)){
                        ?>
                        <option value="<?php echo $itemCategoria['id']?>" <?php echo $itemCategoria['id']==$categoria?'selected':"";?> ?>
                            <?php echo $itemCategoria['nome']?>
                        </option>
                        <?php 
                            }
                        ?>                        
                    </select>  

                    <select name="gosteiId" id=""> 
                        <option value="1">Sim</option>
                        <option value="2">Não</option>                                              
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