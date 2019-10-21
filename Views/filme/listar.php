<?php
    include('../../conexao/validar.php');
    include('../../conexao/conexao.php');
    $nome = $_POST['duracao'];
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
            <a href="http://localhost/Otaku/views/filme/create.php">+ FILME</a>
        </button> 
        <div class="rolagem" >
            <table class="tableMostrar">
                <tr class="tableMostrarTr">  
                    <th><b>URL:</b></th> 
                    <th><b>Descrição:</b></th>
                    <th><b>Data de Lançamento:</b></th> 
                    <th><b>Produtora:</b></th> 
                    <th><b>Categoria:</b></th> 
                    <th><b>Like:</b></th>                     
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th>
                </tr>
                <?php
                    $filtro = '';
                    if ($nome != '') {
                        $filtro = "and duracao like '%".$nome."%'";
                    }
                    $sql =  "SELECT * FROM filme where 1 = 1 ".$filtro;
                    $query = mysqli_query($con, $sql);
                    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        $lista[] = $item;
                    }
                    foreach($lista as $item){
                ?>
                <tr class="tableMostrarTr">
                    <td class="tableMostrarTd"><?php echo $item['NOME']; ?></td>
                    <td class="tableMostrarTd"><?php echo $item['DURACAO']; ?></td>
                    <td class="tableMostrarTd"><?php echo date("d/m/Y", strtotime($item['LANCAMENTODATE'])); ?></td>
                    <td class="tableMostrarTd"><?php echo $item['PRODUTORAID']; ?></td>
                    <td class="tableMostrarTd"><?php echo $item['CATEGORIAID']; ?></td>
                    <td class="tableMostrarTd"><?php echo $item['GOSTEI_ID']; ?></td>
                    <td class="tableMostrarTd acao">
                        <a href="update.php?planoId=<?php echo $item['ID'] ?>">
                            <img class="icones" src="../../img/alterar.png" />
                        </a>
                    </td>
                    <td class="tableMostrarTd acao">
                        <a href="../../Controller/plano/delete.php?planoId=<?php echo $item['ID'] ?>">
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