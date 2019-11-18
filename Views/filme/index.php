<?php
    include('../../conexao/validar.php');
    include('../../conexao/conexao.php');
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
            <table class="tableMostrar" id="tableMostrar">
                <tr class="tableMostrarTr">  
                    <th><b>URL:</b></th> 
                    <th><b>Descrição:</b></th>
                    <th><b>Data de Lançamento:</b></th>                    
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

<script  type="text/javascript" >
    window.onload = function(){
        populaTela();
    } 
    function populaTela(){
        $(document).ready(function(){

            $.ajax({
                type:"POST",
                url:'../../Controller/filme/queryIndex.php',
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
                        tr.append("<td class='tableMostrarTd'>"+response[i].DURACAO+"</td>");
                        tr.append("<td class='tableMostrarTd'>"+response[i].LANCAMENTODATE+"</td>");
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
        window.location.href = "update.php?filmeId="+id;  
    }
    function excluir(id){
        var agree=confirm("deseja deletar este registro?");

        if (agree){
            $(document).ready(function(){
                
                $.ajax({
                    type:"post",
                    url:'../../Controller/filme/delete.php',
                    dataType: 'JSON',
                    async: true,
                    data: {
                        "filmeId": id 
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


<?php
	mysqli_close($con);
?>