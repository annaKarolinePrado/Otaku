<link rel="stylesheet" type="text/css" href="css/padrao.css"> 
<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="login">
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