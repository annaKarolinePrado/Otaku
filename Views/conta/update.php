<?php
    include('../../conexao/conexao.php');
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css"> 
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';
                @$status = $_GET['status'];
                if($status  == 1){
                    echo "<p style='width:100%; float:left; text-align:center;'>
                    Atualiado com sucesso.</p>";
                }
            ?>	
        </header>  
        <?php
            $contaId = @$_GET['contaId'];
            $sql =  "SELECT *   FROM `conta`  where conta.id = $contaId";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $plano = $item['PLANO_ID'];            
            $cartao = $item['CARTAO_ID'];            
        ?>
        <section class="menuAdm">
        <input type="hidden" value="<?php echo $item['PLANO_ID']; ?>">
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/conta/update.php" method="POST">                    
                    <h1 id="titulo">Alterar Conta</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">


                    <select name="planoId" id="planoId"> 
                                              
                    </select> 

                    <select name="cartaoId" id="cartaoId"> 
                                         
                    </select>  
                     <fieldset id="btns">
                        <button class="Botao" type="reset" >Limpar</button>
                        <button class="Botao Botao2" type="submit" >Alterar</button>
                        <a href=""></a>
                    </fieldset>
                </form>
            </section>        
        </section>   
    </body>
    <footer class="rodape rodapePerfil">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>
<?php
	mysqli_close($con);
?>
<script  type="text/javascript" >
    window.onload = function(){
        carregaPlano();
        carregaCartao();
    } 
    function carregaPlano(){
        $(document).ready(function(){
            $.ajax({
                type:"post",
                url:'../../Controller/plano/queryIndex.php',
                dataType: 'JSON',
                async: true,
                data: "{}",
                success:function(response){  
                    console.log(response);
                    var combo = $('#planoId');
                    $(".removePlano").each(function() {
                        $(this).remove();
                    });
                    for(var i = 0; i < response.length; i++){                       
                        combo.append("<option class='removePlano' value='"+response[i].id+"'>"+response[i].descricao+"</option>");
                    }
                },
                error:function(){                   
                    alert("Ocorreu algum problema");                    
                },
            });
        }); 
    }
    function carregaCartao(){
        $(document).ready(function(){
            $.ajax({
                type:"post",
                url:'../../Controller/cartao/queryIndex.php',
                dataType: 'JSON',
                async: true,
                data: "{}",
                success:function(response){  
                    console.log(response);
                    var combo = $('#cartaoId');
                    $(".removeCartao").each(function() {
                        $(this).remove();
                    });
                    for(var i = 0; i < response.length; i++){                       
                        combo.append("<option class='removeCartao' value='"+response[i].id+"'>"+response[i].titular+"</option>");
                    }
                },
                error:function(){                   
                    alert("Ocorreu algum problema");                    
                },
            });
        }); 
    }
    
</script>
