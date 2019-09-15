<?php
	include('../../conexao/conexao.php');
	
	$nome = $_POST['nome'];	
	$login = $_POST['login'];	
	$senha = $_POST['senha'];	
	$perfil = $_POST['perfilId'];	
	
    $sql = "INSERT INTO usuario VALUES (null, '$nome', '$login', '$senha', $perfil)";
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/usuario/create.php?status=1');
	} else {
            header('Location: ../../views/usuario/create.php?status=2');
	}
	
	mysqli_close($con);
?>