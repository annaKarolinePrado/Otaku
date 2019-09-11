<?php
	session_start();
	include('../conexao/conexao.php');
	
	$login = $_POST['login'];
	$senha = md5($_POST['senha']);
	
	
    $sql = "SELECT * FROM usuario WHERE usuario.login ='$login' AND usuario.senha = '$senha'";
	$query = mysqli_query($con, $sql);
	$obj = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	if ($obj['id'] > 0) {
		$_SESSION['id'] = $obj['id'];		
		header('Location: perfil/index.php');
	} else {
		header('Location: ../index.php?erro=1');
	}
	
	mysqli_close($con);
?>