<!DOCTYPE html>
<html>
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="css/padrao.css">          
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <div class="login">            
            <nav class="menu">    
                <ul>
                    <li><a class="index.php" href="http://localhost/Otaku">Início</a></li>
                    <?php
                        session_start();
                        if(@$_SESSION['usuario'] > 0) {                
                    ?>
                    <li><a class="perfil" href="http://localhost/Otaku/views/perfil/index.php">Perfil</a></li>
                    <li><a class="plano" href="http://localhost/Otaku/views/plano/index.php">Plano</a></li>
                    <li><a class="produtora" href="http://localhost/Otaku/views/produtora/index.php">Produtora</a></li>
                    <li><a class="usuario" href="http://localhost/Otaku/views/usuario/index.php">Usuario</a></li>
                    <?php
                        }
                    ?>
                    <li><a class="cadastreSe" href="http://localhost/Otaku/views/usuario/create.php">Cadastre-se</a></li>     
                    <li><a class="sair" href="http://localhost/Otaku/views/admin/sair.php">Sair</a></li>
                </ul>
            </nav>	
            <?php
                if(@$_GET['erro'] == 1) {
            ?>         
                <p >Usuário ou senha inválida!</p> 
            <?php    
                }
            ?>
            <p> Login</p>
            <form action="Controller/login_db.php" method="POST">
                <input id="email" type="text" name="login" placeholder="Seu email" /><br>
                <input id="senha" type="password" name="senha" placeholder="senha" /><br/>
                <button id="btns" type="submit">Logar</button>
            </form>
        </div>
    </body>
</html>