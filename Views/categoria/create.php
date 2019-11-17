<?php 
    include('../../conexao/validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>    
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css"> 
    </head>
    <body>
        <header id="topo">
            <?php include '../cabecalho.php'; ?>			
        </header>        
        <section class="divForms">
            <form  id="formPerfil" action="../../Controller/categoria/salvar.php" method="post"><br>
                <h1 id="titulo" align="center">Cadastrar categoria</h1> 
                <label for="nome"><b>Nome:</b></label>         
                <input class="inputForm" name="nome" type="text" placeholder="Nome:" required id="nome"><br>                    
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Linpar</button>
                    <button class="Botao Botao2" type="button" id="btnEnviar">Enviar</button>
                </fieldset>
            </form>
        </section>    
        <footer class="rodape rodapeCategoria">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>
<script  type="text/javascript" >
    window.onload = function(){ 
        $(document).ready(function(){
            $("#btnEnviar").on('click', function(){
                    
                var nome = $('#nome').val();
                
                $.ajax({
                    type:"post",
                    url:'../../Controller/categoria/salvar.php',
                    dataType: 'JSON',
                    async: true,
                    data: { 
                        "nome": nome
                    },
                    success:function(response){  
                        alert("Cadastrado com sucesso!!");
                        console.log(response);
                    },
                    error:function(){                   
                            alert("Ocorreu algum problema :o");                    
                    },
                });
            });
        });   
    }
</script>