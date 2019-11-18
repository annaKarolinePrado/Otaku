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
            <table class="tableMostrar" id="tableMostrar">
                <tr class="tableMostrarTr">
                    <th><b>Nivel:</b></th> 
                    <th><b>Decrição:</b></th>
                    <th><b>Alterar:</b></th> 
                    <th><b>Excluir:</b></th> 
                </tr>
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
<script  type="text/javascript" >
    window.onload = function(){
        populaTela();
    } 
    function populaTela(){
        $(document).ready(function(){

            $.ajax({
                type:"post",
                url:'../../Controller/perfil/queryIndex.php',
                dataType: 'JSON',
                async: true,
                data: "{}",
                success:function(response){  
                    console.log(response);
                    var tabela = $('#tableMostrar');
                    $(".removeTr").each(function() {
                        $(this).remove();
                    });
                    for(var i = 0; i < response.length; i++){                       
                        var tabela = $('#tableMostrar');
                        var tr = $("<tr class='removeTr'>"); 
                        tr.append("<td class='tableMostrarTd'>"+response[i].nivel+"</td>");
                        tr.append("<td class='tableMostrarTd'>"+response[i].descricao+"</td>");
                        tr.append("<td class='tableMostrarTd acao' onClick='alterar("+response[i].id+")'><a><img class='icones' src='../../img/alterar.png'></a></td>");
                        tr.append("<td class='tableMostrarTd acao' onClick='excluir("+response[i].id+")'><a><img class='icones' src='../../img/excluir.png'></a></td>");
                        tabela.append(tr);
                    }
                },
                error:function(){                   
                    alert("Ocorreu algum problema");                    
                },
            });
        }); 
    }
    function alterar(id){
        window.location.href = "update.php?perfilId="+id;  
    }
    function excluir(id){
        var agree=confirm("deseja deletar este registro?");

        if (agree){
            $(document).ready(function(){
                
                $.ajax({
                    type:"post",
                    url:'../../Controller/perfil/delete.php',
                    dataType: 'JSON',
                    async: true,
                    data: {
                        "perfilId": id 
                    },
                    success:function(response){  
                        console.log(response);
                        populaTela();
                    },
                    error:function(){                   
                        alert("Não foi possível excluir, tente mais tarde!");                    
                    },
                }); 
            });
        }
    }
</script>