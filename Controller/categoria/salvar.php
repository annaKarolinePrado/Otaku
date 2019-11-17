<?php
	session_start();
	include('../../conexao/conexao.php');

	$nome = $_POST['nome'];	
	
    $sql = "INSERT INTO categoria VALUES (null, '$nome')";
	$query = mysqli_query($con, $sql);
	
	if($query) {
		$response = array("status" => 1);
	} else {
		$response = array("status" => 2);
	}
	echo json_encode($response);
?>