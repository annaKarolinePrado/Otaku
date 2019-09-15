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
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';?>			
        </header>
        <div class="rolagem">
            <table class="tableMostrar">
                <tr class="tableMostrarTr">
                    <th><b>Nome:</b></th> 
                    <th><b>Decrição:</b></th>
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT * FROM perfil";
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                ?>
                    <tr class="tableMostrarTr">
                        <td class="tableMostrarTd"><?php echo $item['nivel']; ?></td>
                        <td class="tableMostrarTd"><?php echo $item['descricao']; ?></td>
                        <td class="tableMostrarTd acao">
                            <a href="update.php?perfilId=<?php echo $item['id'] ?>">
                                <img class="icones" src="../../img/alterar.png" />
                            </a>
                        </td>
                        <td class="tableMostrarTd acao">
                            <a href="../../Controller/perfil/delete.php?perfilId=<?php echo $item['id'] ?>">Excluir</a>
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