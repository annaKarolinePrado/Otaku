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
            <?php include '../cabecalho.php';?>	
        </header>
        <section class="menuAdm">
            <section class="divForms">
                <form  id="formPerfil" action="../../Controller/categoria/update.php" method="POST"><br>                
                    <h1 id="titulo"  align="center">Alterar categoria</h1>        
                    <input class="inputForm" name="id" type="hidden" id="id">
                    <label for="nome"><b>Nome:</b></label> 
                    <input class="inputForm" name="nome" type="text"  required id="nome">
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Limpar</button>
                        <button class="Botao Botao2" type="button" id="btnAlterar">Alterar</button>
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
        console.log(obterParametros());
        populaTela(obterParametros());
        $("#btnAlterar").on('click', function(){
            altera();
        });
    } 
    function obterParametros(){
        var query = location.search.slice(1);
        var partes = query.split('&');
        var data = {};
        partes.forEach(function (parte) {
            var chaveValor = parte.split('=');
            var chave = chaveValor[0];
            var valor = chaveValor[1];
            data[chave] = valor;
        });
        return data;
    }
    function populaTela(parametros){
        $(document).ready(function(){
                    
            var nome = $('#nome').val();
            
            $.ajax({
                type:"post",
                url:'../../Controller/categoria/query.php',
                dataType: 'JSON',
                async: true,
                data: parametros,
                success:function(response){  
                    console.log(response);
                    $('#id').val(response[0].id);
                    $('#nome').val(response[0].nome);
                    console.log(response[0].nome);
                },
                error:function(){                   
                        alert("Ocorreu algum problema :o");                    
                },
            });
        }); 
    }
    function altera(){
        $(document).ready(function(){
                    
            var id = $('#id').val();
            var nome = $('#nome').val();
            
            $.ajax({
                type:"post",
                url:'../../Controller/categoria/update.php',
                dataType: 'JSON',
                async: true,
                data: { 
                    "id": id,
                    "nome": nome
                },
                success:function(response){  
                    window.location.href = "index.php";  
                    console.log(response);
                },
                error:function(){                   
                    alert("Ocorreu algum problema :o");                    
                },
            });
        }); 
    }
</script>

<?php
	mysqli_close($con);
?>