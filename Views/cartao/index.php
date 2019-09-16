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
            <div class="rolagem" > 
            <button class="novoObjeto" name="nome" type="button" placeholder="Nome:" required >
                <a href="http://localhost/Otaku/views/cartao/create.php">+ CARTÃO</a>
            </button>
            <table class="tableMostrar" border="1">
                <tr class="tableMostrarTr">
                    <th><b>Nome Titular:</b></th> 
                    <th><b>Número do cartão:</b></th>
                    <th><b>Chave de Segurança:</b></th> 
                    <th><b>Usuário:</b></th> 
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT * FROM cartao";
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                ?>
                    <tr class="tableMostrarTr" >
                        <td class="tableMostrarTd"><?php echo $item['titular']; ?></td>
                        <td class="tableMostrarTd"><?php echo $item['numero']; ?></td>
                        <td class="tableMostrarTd"><?php echo $item['chaveSeguranca']; ?></td>
                        <?php
                                $usuarioId = $item['usuarioId'];
                                $sql =  "SELECT * FROM usuario WHERE id='$usuarioId'";
                                $queryUsuario = mysqli_query($con, $sql);
                                while ($itemUsuario = mysqli_fetch_array($queryUsuario, MYSQLI_ASSOC)){
                                    $nome = $itemUsuario['nome'];
                                }
                            ?>
                        <td class="tableMostrarTd"><?php echo $nome; ?></td>
                        <td class="tableMostrarTd acao">
                            <a href="update.php?id=<?php echo $item['id'] ?>">
                                <img class="icones" src="../../img/alterar.png" />
                            </a>
                        </td>
                        <td class="tableMostrarTd acao">
                            <a href="../../Controller/cartao/delete.php?usuarioId=<?php echo $item['id'] ?>">
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