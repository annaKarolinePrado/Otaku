<?php
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';?>			
        </header>
        <div class="rolagem" >
            <table class="tableMostrar">
                <tr class="tableMostrarTr">
                    <th><b>Nome:</b></th> 
                    <th><b>Código:</b></th>
                    <th><b>Descrição</b></th> 
                    <th><b>Valor:</b></th> 
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT * FROM plano";
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                ?>
                    <tr class="tableMostrarTr">
                        <td class="tableMostrarTd">Nome</td>
                        <td class="tableMostrarTd"><?php echo $item['nome']; ?></td>
                        <td class="tableMostrarTd">Código</td>
                        <td class="tableMostrarTd"><?php echo $item['codigo']; ?></td>
                        <td class="tableMostrarTd">Descrição</td>
                        <td class="tableMostrarTd"><?php echo $item['descricao']; ?></td>
                        <td class="tableMostrarTd">Valor</td>
                        <td class="tableMostrarTd"><?php echo $item['valor']; ?></td>
                        <td></td>
                        <td class="tableMostrarTd acao">
                            <a href="update.php?planoId=<?php echo $item['id'] ?>">Alterar</a>
                        </td>
                        <td class="tableMostrarTd acao">
                            <a href="../../Controller/plano/delete.php?planoId=<?php echo $item['id'] ?>">Excluir</a>
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