<?php
	include('../../conexao/conexao.php');

	$id        = $_POST['id'];
	$nivel     = $_POST['nivel'];
	$descricao = $_POST['descricao'];			
	
	$sql = "UPDATE perfil SET nivel = $nivel, descricao = '$descricao' WHERE id = $id";
	
	$query = mysqli_query($con, $sql);
	if($query) {
		header('Location: ../../views/perfil/index.php?status=1');
	} else {
			header('Location: ../../views/perfil/index.php?status=2');
	}
	mysqli_close($con);
?>