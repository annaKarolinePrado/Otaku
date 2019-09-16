<!DOCTYPE html>
<html>
    <head>   
        <meta charset= "utf-8" />
        <link rel="stylesheet" type="text/css" href="css/padrao.css">          
        <link rel="stylesheet" type="text/css" href="css/forms.css">
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
                    <li><a class="usuario" href="http://localhost/Otaku/views/categoria/index.php">Categoria</a></li>
                    <li><a class="cartao" href="http://localhost/Otaku/views/cartao/index.php">Cartão</a></li>
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
            <div class="divForms">
                <form action="Controller/login_db.php" method="POST">
                    <div class="imgcontainer">
                        <img src="img/avatarLogin.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        <label for="login"><b>Login:</b></label>
                        <input type="text" placeholder="Digite seu login" name="login" required>
                        <label for="senha"><b>Senha:</b></label>
                        <input type="password" placeholder="Digite sua enha" name="senha" required>
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <footer class="rodape">
        <?php include 'views/rodape.php'; ?>	
    </footer>
</html>