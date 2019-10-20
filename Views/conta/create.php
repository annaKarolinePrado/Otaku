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
    <body>
        <header id="topo">
            <?php include '../cabecalho.php';             
                @$status = $_GET['status'];
                if($status  == 1){
                    echo "<p style='width:100%; float:left; text-align:center;'>
                    Cadastrado com sucesso.</p>";
                }
            ?>			
        </header>        
        <section class="divForms"><br>
            <h1 align="center">Cadastro de conta</h1><br>
            <form  id="formconta" action="../../Controller/conta/salvar.php" method="post">  
                <label for="plano_id">Plano:</label>
                <select name="plano_id" id="plano_id">
                    <?php
                        $sql = "SELECT id, nome FROM plano";
                        $query = mysqli_query($con, $sql);
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                    <?php
                        }
                    ?>
                </select><br><br>            
                <label for="cartao_id">Cartão:</label>
                <select name="cartao_id" id="cartao_id">
                    <?php
                        $usuario_id = @$_SESSION['usuario'];
                        $sql = "SELECT id, titular, numero FROM cartao where usuarioId = '".$usuario_id."'";
                        $query = mysqli_query($con, $sql);
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['titular'].' - '.$item['numero'] ?></option>
                    <?php
                        }
                    ?>
                </select><br><br>                   
                <fieldset id="btns">
                    <button class="Botao" type="reset" >Limpar</button>
                    <button class="Botao Botao2" type="submit" >Enviar</button>
                </fieldset>
            </form>
        </section>    
        <footer class="rodape rodapeconta">
            <?php include '../rodape.php'; ?>	
        </footer>	
    </body>
</html>