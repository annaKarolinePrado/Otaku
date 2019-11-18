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
                    <input class="inputForm" name="duracao" type="text" placeholder="descricao" required><br>
                    
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Linpar</button>
                        <button class="Botao Botao2" id="btnPesquisar" >Pesquisar</button>
                        
                    </fieldset>
                </form>
            </section> 
        </div>  
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
                    //$json_lista = json_encode($lista);

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

<script  type="text/javascript" >
    window.onload = function(){
        $("#btnPesquisar").click(
            populaTela();
        )};
        
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