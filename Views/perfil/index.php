<?php
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
    $usuarioLogado = @$_SESSION['usuario'];
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
            <a href="http://localhost/Otaku/views/perfil/create.php">+ PERFIL</a>
        </button>
        <div class="tmMax">
            <img id="imgPerfil" src="../../img/usuario/user<?php echo $usuarioLogado ?>">
            <?php
                $sql =  "SELECT usuario.nome FROM usuario WHERE usuario.id =".$usuarioLogado;
                $query = mysqli_query($con, $sql);
                while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            ?>
            <b class="tmMax" align="center">Bem vindo <?php echo $item['nome'] ?></b><?php } ?>
        </div>
        <div class="rolagem">
            <table class="tableMostrar">
                <tr class="tableMostrarTr">
                    <th><b>Nome:</b></th> 
                    <th><b>Decrição:</b></th>
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th> 
                </tr>
                <?php
                    $sql =  "SELECT perfil.id, perfil.descricao, perfil.nivel FROM perfil INNER JOIN usuario ON (usuario.perfilId = perfil.id) 
                             WHERE perfil.descricao IN ('Administrador', 'Master') AND usuario.id =".$usuarioLogado;
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
                            <a href="../../Controller/perfil/delete.php?perfilId=<?php echo $item['id'] ?>">
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