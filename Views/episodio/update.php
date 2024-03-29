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
    <header id="topo">
        <?php include '../cabecalho.php';
            @$status = $_GET['status'];
            if($status  == 1){
                echo "<p style='width:100%; float:left; text-align:center;'>
                Atualiado com sucesso.</p>";
            }
        ?>
    </header>
    <body>
        <?php
            $episodioId = @$_GET['episodioId'];
            $sql =  "SELECT * FROM epsodio WHERE ID = $episodioId";
            $query = mysqli_query($con, $sql);
            $item = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <section class="menuAdm"> 
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/episodio/update.php" method="POST"><br>                    
                    <h1 id="titulo" align="center">Alterar episodio</h1>                
                    <input class="inputForm" name="id" type="hidden" value="<?php echo $item['ID']; ?>">
                    <label for="nome"><b>Nome:</b></label> 
                    <input class="inputForm" name="nome" type="text"  required value="<?php echo $item['NOME']; ?>">
                    <label for="temporadaId"><b>Temporada:</b></label>
                    <select name="temporadaId" id="temporadaId"> </select> 
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Limpar</button>
                        <button class="Botao Botao2" type="submit" >Alterar</button>
                        <a href=""></a> 
                    </fieldset>
                </form>
            </section>        
        </section>   
    </body>
    <footer class="rodape">
        <?php include '../rodape.php'; ?>	
    </footer>
</html>

<script  type="text/javascript" >
    window.onload = function(){
        carregaTemporada();
    } 
    function carregaTemporada(){
        $(document).ready(function(){

            $.ajax({
                type:"post",
                url:'../../Controller/temporada/queryIndex.php',
                dataType: 'JSON',
                async: true,
                data: "{}",
                success:function(response){  
                    console.log(response);
                    var combo = $("#temporadaId");
                    $(".remove").each(function() {
                        $(this).remove();
                    });
                    for(var i = 0; i < response.length; i++){                       
                        combo.append("<option class='remove' value='"+response[i].id+"'>"+response[i].NOME+"</option>");
                    }
                },
                error:function(){                   
                    alert("Ocorreu algum problema");                    
                },
            });
        }); 
    }
</script>
<?php
	mysqli_close($con);
?>