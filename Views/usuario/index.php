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
        <table class="tableMostrar" border="1">
            <tr class="tableMostrarTr">
                <th><b>Nome</b></th> 
                <th><b>Login</b></th>
                <th><b>Perfil</b></th> 
                <th><b>Alterar</b></th> 
                <th><b>Excluir</b></th> 
            </tr>
            <?php
                $sql =  "SELECT * FROM usuario";
                $query = mysqli_query($con, $sql);
                while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            ?>
                <tr class="tableMostrarTr" >
                    <td class="tableMostrarTd"><?php echo $item['nome']; ?></td>
                    <td class="tableMostrarTd"><?php echo $item['login']; ?></td>
                    <td class="tableMostrarTd"><?php echo $item['perfilId']; ?></td>
                    <td class="tableMostrarTd">
                        <a href="update.php?usuarioId=<?php echo $item['id'] ?>">Alterar</a>
                    </td>
                    <td>
                        <a href="../../Controller/usuario/delete.php?usuarioId=<?php echo $item['id'] ?>">Excluir</a>
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