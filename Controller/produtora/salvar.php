<?php
	include('../../conexao/conexao.php');
	
	$nome = $_POST['nome'];	
	
    $sql = "INSERT INTO produtora VALUES (null, '$nome')";
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/produtora/create.php?status=1');
	} else {
            header('Location: ../../views/produtora/create.php?status=2');
	}
	
	mysqli_close($con);
?>