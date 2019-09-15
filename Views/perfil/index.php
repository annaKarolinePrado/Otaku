<?php
	session_start();
	include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/padrao.css"> 
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';?>			
        </header>

        <table class="tableMostrar">
            <?php
                $sql =  "SELECT * FROM perfil";
                $query = mysqli_query($con, $sql);
                while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            ?>
                <tr class="tableMostrarTr">
                    <td class="tableMostrarTd">Nome</td>
                    <td class="tableMostrarTd"><?php echo $item['nivel']; ?></td> 
                    <td class="tableMostrarTd"><?php echo $item['descricao']; ?></td> 
                    <td></td>
                    <td class="tableMostrarTd">
                        <a href="../../Controller/perfil/update.php?update=<?php echo $item['id'] ?>">Alterar</a>
                    </td>
                    <td>
                        <a href="../../Controller/perfil/delete.php?delete=<?php echo $item['id'] ?>">Excluir</a>
                    </td>
                </tr>            
            <?php
                }
            ?>    
        </table>   
    </body>
    <footer class="rodape">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>
<?php
	mysqli_close($con);
?>