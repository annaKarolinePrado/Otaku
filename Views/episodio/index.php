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
            <table class="tableMostrar" border="1" id="tableMostrar">
                <tr class="tableMostrarTr">
                    <th><b>Nome</b></th> 
                    <th><b>Temporada</b></th>
                    <th><b>Alterar</b></th> 
                    <th><b>Excluir</b></th> 
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
                url:'../../Controller/episodio/queryIndex.php',
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
                        tr.append("<td class='tableMostrarTd'>"+response[i].NOME+"</td>");
                        tr.append("<td class='tableMostrarTd'>"+response[i].temporada+"</td>");
                        tr.append("<td class='tableMostrarTd acao' onClick='alterar("+response[i].ID+")'><a><img class='icones' src='../../img/alterar.png'></a></td>");
                        tr.append("<td class='tableMostrarTd acao' onClick='excluir("+response[i].ID+")'><a><img class='icones' src='../../img/excluir.png'></a></td>");
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
        window.location.href = "update.php?episodioId="+id;  
    }
    function excluir(id){
        var agree=confirm("deseja deletar este registro?");

        if (agree){
            $(document).ready(function(){
                
                $.ajax({
                    type:"post",
                    url:'../../Controller/episodio/delete.php',
                    dataType: 'JSON',
                    async: true,
                    data: {
                        "episodioId": id 
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