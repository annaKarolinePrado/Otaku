<?php 
    include('../../conexao/validar.php');
    include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/padrao.css"> 
        <link rel="stylesheet" type="text/css" href="../../css/forms.css"> 
    </head>
    <header id="topo">
        <?php include '../cabecalho.php';             
            @$status = $_GET['status'];
            if($status  == 1){
                echo "<p style='width:100%; float:left; text-align:center;'>
                Cadastrado com sucesso.</p>";
            }
        ?>			
    </header>
    <body>      
        <div class="divForms" > 
            <section id="plano">
                <form  id="formplano" action="../../Controller/filme/salvar.php" method="post"><br>    
                    <h1 id="titulo" align="center">Cadastrar filme</h1>        
                    <label for="nome"><b>URL:</b></label>
                    <input class="inputForm" name="nome" type="text" placeholder="URL" required><br>
                    <label for="descricao"><b>Duração:</b></label>
                    <input class="inputForm" name="descricao" type="text" placeholder="Duração" required><br>
                    <label for="lancamentoDaate"><b>Data de Lançamento:</b></label>
                    <input class="inputForm" name="lancamentoDate" type="Date" placeholder="Data de Lançamento" required><br>
                    <label for="produtoidra"><b>Produtora:</b></label>
                    <select name="produtoraId" id="produtoraId">
                        <?php
                            $sql = "SELECT id, nome FROM produtora";
                            $query = mysqli_query($con, $sql);
                            while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                        <?php
                            }
                        ?>
                    </select><br><br>
                    <label for="categoria"><b>Categoria:</b></label>                        
                    <select name="categoriaId" id="categoriaId">
                        <?php
                            $sql = "SELECT id, nome FROM categoria";
                            $query = mysqli_query($con, $sql);
                            while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                        <?php
                            }
                        ?>
                    </select><br><br>               
                        <label for="gostei"><b>Like:</b></label>
                        <select name="gosteiId" id="gosteiId">                        
                        <option value="1">Sim</option>
                        <option value="2">Não</option>                        
                    </select><br><br>
                    <fieldset id="btns">
                        <button class="Botao" type="reset" >Linpar</button>
                        <button class="Botao Botao2" type="submit" >Enviar</button>
                        <button class="Botao Botao2"><a href="pesquisar.php" >Pesquisar</a></button>
                        
                    </fieldset>
                </form>
            </section> 
        </div>   
        <footer class="rodape">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>