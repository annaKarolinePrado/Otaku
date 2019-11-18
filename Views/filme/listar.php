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
        <link rel="stylesheet" type="text/css" href="../../css/forms.css"> 
    </head>
    <header id="topo">
        <?php include '../cabecalho.php';?>			
    </header>
    <body>
        <button class="novoObjeto" name="nome" type="button" placeholder="Nome:" required >
            <a href="http://localhost/Otaku/views/filme/create.php">+ FILME</a>
        </button> 
        <div class="rolagem" >
        <div class="divForms" > 
            <section id="plano">
                <form  id="formplano" action="" method="post"><br>    
                    <h1 id="titulo" align="center">Pesquisar filme</h1>        
                    <label for="descricao"><b>Descrição:</b></label>
                    <input class="inputForm" name="duracao"  id="duracao" type="text" placeholder="descricao" required><br>
                    
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Linpar</button>
                        <button class="Botao Botao2" type="button" id="btnPesquisar" >Pesquisar</button>
                        
                    </fieldset>
                </form>
            </section> 
        </div>  
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
<?php
	mysqli_close($con);
?>

<script  type="text/javascript" >
    window.onload = function(){
        $("#btnPesquisar").click(function(){
            pesquisarFilme();
        });
        
    } 
    function pesquisarFilme(){
        $(document).ready(function(){
            var nome = $("#duracao").val();
            console.log(nome);
            $.ajax({
                type:"post",
                url:'../../Controller/filme/queryPesquisar.php',
                dataType: 'JSON',
                async: true,
                data: {
                    "nome":nome
                },
                success:function(response){  

                    console.log(response);
                    var tabela = $('#tableMostrar');
                    $(".remove").each(function() {
                        $(this).remove();
                    });
                    for(var i = 0; i < response.length; i++){                       
                        var tabela = $('#tableMostrar');
                        var tr = $("<tr class='remove'>"); 
                        tr.append("<td class='tableMostrarTd'>"+response[i].NOME+"</td>");
                        tr.append("<td class='tableMostrarTd'>"+response[i].DURACAO+"</td>");
                        tr.append("<td class='tableMostrarTd'>"+response[i].LANCAMENTODATE+"</td>");
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
        window.location.href = "update.php?filmeId="+id;  
    }
    function exclui(id){
        var agree=confirm("deseja deletar este registro?");

        if (agree){
            $(document).ready(function(){

                var nome = $('#nome').val();
                
                $.ajax({
                    type:"post",
                    url:'../../Controller/categoria/delete.php',
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