<?php
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/listagem.css"> 
    </head>
    <header id="topo">
        <?php include '../cabecalho.php';?>			
    </header>
    <body>
        <button class="novoObjeto" name="nome" type="button" placeholder="Nome:" required >
            <a href="http://localhost/Otaku/views/serie/create.php">+ SERIE</a>
        </button> 
        <div class="rolagem" >
            <table class="tableMostrar">
                <tr class="tableMostrarTr">  
                    <th><b>Nome:</b></th> 
                    <th><b>Produtora:</b></th>
                    <th><b>Categoria</b></th> 
                    <th><b>Gostei:</b></th> 
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT * FROM serie";
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                ?>
                    <tr class="tableMostrarTr">
                        <td class="tableMostrarTd"><?php echo $item['NOME']; ?></td>
                        <?php
                            $idProdutora = $item['PRODUTORAID'];
                            $sqlProdutora =  "SELECT * FROM produtora WHERE id=$idProdutora";
                            $queryProdutora = mysqli_query($con, $sqlProdutora);
                            while ($itemProdutora = mysqli_fetch_array($queryProdutora, MYSQLI_ASSOC)){
                                $produtoraNome = $itemProdutora['nome'];
                            }
                        ?>
                        <?php
                            $idCategoria = $item['CATEGORIAID'];
                            $sqlCategoria =  "SELECT * FROM categoria WHERE id=$idCategoria";
                            $queryCategoria = mysqli_query($con, $sqlCategoria);
                            while ($itemCategoria = mysqli_fetch_array($queryCategoria, MYSQLI_ASSOC)){
                                $categoriaNome = $itemCategoria['nome'];
                            }
                        ?>
                        
                        <td class="tableMostrarTd"><?php echo $produtoraNome; ?></td>
                        <td class="tableMostrarTd"><?php echo $categoriaNome; ?></td>
                        <td class="tableMostrarTd"><?php echo $item['GOSTEIID'] == 1?'Sim':'Não'; ?></td>
                        <td class="tableMostrarTd acao">
                            <a href="update.php?serieId=<?php echo $item['ID'] ?>">
                                <img class="icones" src="../../img/alterar.png" />
                            </a>
                        </td>
                        <td class="tableMostrarTd acao">
                            <a href="../../Controller/serie/delete.php?serieId=<?php echo $item['ID'] ?>">
                                <img class="icones" src="../../img/excluir.png" />
                            </a>
                        </td>
                    </tr>            
                <?php
                    }
                ?>    
            </table> 
            </div>  
    </body>
    <footer class="rodape">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>
<?php
	mysqli_close($con);
?>