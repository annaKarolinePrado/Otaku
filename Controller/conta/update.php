<?php
	include('../../conexao/conexao.php');

	$id   = $_POST['id'];
	$cartaoId = $_POST['cartaoId'];			
	$planoId = $_POST['planoId'];		
	
	$sql = "UPDATE conta SET CARTAO_ID = $cartaoId, PLANO_ID = $planoId WHERE ID = $id";
	
	$query = mysqli_query($con, $sql);
	if($query) {
		header('Location: ../../views/conta/index.php?status=1');
	} else {
		header('Location: ../../views/conta/index.php?status=2');
	}
	mysqli_close($con);
?>