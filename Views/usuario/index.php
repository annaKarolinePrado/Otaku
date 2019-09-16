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
            <button class="novoObjeto" name="nome" type="button" placeholder="Nome:" required >
                <a href="http://localhost/Otaku/views/usuario/create.php">+ Usuario</a>
            </button>
            <div class="rolagem" >
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
                            <?php
                                $idPerfil = $item['perfilId'];
                                $sql =  "SELECT * FROM perfil WHERE id='$idPerfil'";
                                $queryPerfil = mysqli_query($con, $sql);
                                while ($itemPerfil = mysqli_fetch_array($queryPerfil, MYSQLI_ASSOC)){
                                    $perfil = $itemPerfil['descricao'];
                                }
                            ?>
                            <td class="tableMostrarTd"><?php echo $perfil; ?></td>
                            <td class="tableMostrarTd acao">
                                <a href="update.php?usuarioId=<?php echo $item['id'] ?>">
                                    <img class="icones" src="../../img/alterar.png" />
                                </a>
                            </td>
                            <td class="tableMostrarTd acao">
                                <a href="../../Controller/usuario/delete.php?usuarioId=<?php echo $item['id'] ?>">
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