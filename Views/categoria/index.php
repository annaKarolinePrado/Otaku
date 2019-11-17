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
            <a href="http://localhost/Otaku/views/categoria/create.php">+ CATEGORIA</a>
        </button> 
        <div class="rolagem">
            <table class="tableMostrar" >
                
                <tbody id="tableMostrar">
                <tr class="tableMostrarTr">
                    <th><b>Nome:</b></th> 
                    <th><b>Alterar</b></th> 
                    <th><b>Excluir</b></th> 
                </tr>
                </tbody>
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
                url:'../../Controller/categoria/queryIndex.php',
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
                        tr.append("<td class='tableMostrarTd'>"+response[i].nome+"</td>");
                        tr.append("<td class='tableMostrarTd acao' onClick='alterarCategoria("+response[i].id+")'><a><img class='icones' src='../../img/alterar.png'></a></td>");
                        tr.append("<td class='tableMostrarTd acao' onClick='excluirCategoria("+response[i].id+")'><a><img class='icones' src='../../img/excluir.png'></a></td>");
                        tabela.append(tr);
                    }
                },
                error:function(){                   
                    alert("Ocorreu algum problema");                    
                },
            });
        }); 
    }
    function alterarCategoria(categoriaId){
        window.location.href = "update.php?categoriaId="+categoriaId;  
    }
    function excluirCategoria(categoriaId){
        var agree=confirm("deseja deletar esta categoria?");

        if (agree){
            $(document).ready(function(){

                var nome = $('#nome').val();
                
                $.ajax({
                    type:"post",
                    url:'../../Controller/categoria/delete.php',
                    dataType: 'JSON',
                    async: true,
                    data: {
                        "categoriaId": categoriaId 
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