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
            <a href="http://localhost/Otaku/views/filme/create.php">+ FILME</a>
        </button><br> 
        <button class="novoObjeto" name="addImagemPerfil" type="button" placeholder="Nome:" required >
            <a href="http://localhost/Otaku/views/perfil/imagem.php">+ IMAGEM PERFIL</a>
        </button> 
    </body>
    <footer class="rodape">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>
<?php
	mysqli_close($con);
?>