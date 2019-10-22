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
            <a href="http://localhost/Otaku/views/episodio/create.php">+ EPISODIO</a>
        </button>
        <div class="rolagem" >
            <table class="tableMostrar" border="1">
                <tr class="tableMostrarTr">
                    <th><b>Nome</b></th> 
                    <th><b>Temporada</b></th>
                    <th><b>Alterar</b></th> 
                    <th><b>Excluir</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT * FROM epsodio";
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                ?>
                <tr class="tableMostrarTr" >
                    <td class="tableMostrarTd"><?php echo $item['NOME']; ?></td>
                    <?php
                        $idTemporada = $item['TEMPORADAID'];
                        $sql_temporada =  "SELECT * FROM temporada WHERE ID=$idTemporada";
                        $queryTemporada = mysqli_query($con, $sql_temporada);
                        while ($itemTemporada = mysqli_fetch_array($queryTemporada, MYSQLI_ASSOC)){
                            $temporada = $itemTemporada['NOME'];
                        }
                    ?>
                    <td class="tableMostrarTd"><?php echo $temporada; ?></td>
                    <td class="tableMostrarTd acao">
                        <a href="update.php?episodioId=<?php echo $item['ID'] ?>">
                            <img class="icones" src="../../img/alterar.png" />
                        </a>
                    </td>
                    <td class="tableMostrarTd acao">
                        <a href="../../Controller/episodio/delete.php?episodioId=<?php echo $item['ID'] ?>">
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