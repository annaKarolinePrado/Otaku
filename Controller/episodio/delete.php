<?php
	include('../../conexao/conexao.php');

	$id = $_POST['episodioId'];			
	
	$sql = "DELETE FROM epsodio WHERE ID = $id";
	
	$query = mysqli_query($con, $sql);
	if($query) {
		$response = array("status" => 1);
	} else {
		$response = array("status" => 2);
	}
	echo json_encode($response);
	mysqli_close($con);
?>