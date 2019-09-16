<?php
	session_start();
	include('../../conexao/conexao.php');
	
	$numero = $_POST['numero'];	
	$descricao = $_POST['descricao'];	
	
    $sql = "INSERT INTO perfil VALUES (null, ".$numero.",'".$descricao."')";
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/perfil/create.php?status=1');
	} else {
            header('Location: ../../views/perfil/create.php?status=2');
	}
	
	mysqli_close($con);
?>