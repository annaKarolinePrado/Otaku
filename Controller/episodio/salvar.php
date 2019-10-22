<?php
	include('../../conexao/conexao.php');
	
	$nome = $_POST['nome'];	
	$temporada = $_POST['temporadaId'];
	
    $sql = "INSERT INTO epsodio VALUES (null, '$nome', $temporada)";
	$query = mysqli_query($con, $sql);
	if($query) {
        header('Location: ../../views/episodio/index.php?status=1');
	} else {
		//echo mysqli_error($query);
        header('Location: ../../views/episodio/index.php?status=2');
	}
	
	mysqli_close($con);
?>