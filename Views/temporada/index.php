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
            <a href="http://localhost/Otaku/views/temporada/create.php">+ TEMPORADA</a>
        </button>
        <div class="rolagem" >
            <table class="tableMostrar" border="1">
                <tr class="tableMostrarTr">
                    <th><b>Nome</b></th> 
                    <th><b>Sequencial</b></th>
                    <th><b>Série</b></th> 
                    <th><b>Alterar</b></th> 
                    <th><b>Excluir</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT * FROM temporada";
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                ?>
                <tr class="tableMostrarTr" >
                    <td class="tableMostrarTd"><?php echo $item['NOME']; ?></td>
                    <td class="tableMostrarTd"><?php echo $item['SEQUENCIAL']; ?></td>
                    <?php
                        $idSerie = $item['SERIEID'];
                        $sql =  "SELECT * FROM serie WHERE id='$idSerie'";
                        $querySerie = mysqli_query($con, $sql);
                        while ($itemSerie = mysqli_fetch_array($querySerie, MYSQLI_ASSOC)){
                            $serie = $itemSerie['NOME'];
                        }
                    ?>
                    <td class="tableMostrarTd"><?php echo $serie; ?></td>
                    <td class="tableMostrarTd acao">
                        <a href="update.php?temporadaId=<?php echo $item['ID'] ?>">
                            <img class="icones" src="../../img/alterar.png" />
                        </a>
                    </td>
                    <td class="tableMostrarTd acao">
                        <a href="../../Controller/temporada/delete.php?temporadaId=<?php echo $item['ID'] ?>">
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