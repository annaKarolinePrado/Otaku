<?php
	include('../../conexao/conexao.php');
	
	$nome = $_POST['nome'];	
	$sequencial = $_POST['sequencial'];	
	$serie = $_POST['serieId'];		
	
    $sql = "INSERT INTO temporada VALUES (null, '$nome', $sequencial, $serie)";
	$query = mysqli_query($con, $sql);
	if($query) {
        header('Location: ../../views/temporada/create.php?status=1');
	} else {
		echo mysqli_error($query);
        //header('Location: ../../views/temporada/create.php?status=2');
	}
	
	mysqli_close($con);
?>