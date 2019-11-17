<?php
	include('../../conexao/conexao.php');

	$id   = $_POST['id'];
	$nome = $_POST['nome'];			
	
	$sql = "UPDATE categoria SET nome = '$nome' WHERE id = $id";
	
	$query = mysqli_query($con, $sql);
	if($query) {
		$response = array("status" => 1);
	} else {
		$response = array("status" => 2);
	}
	echo json_encode($response);
		
	mysqli_close($con);
?>