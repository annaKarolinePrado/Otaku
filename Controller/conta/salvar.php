<?php
	include('../../conexao/conexao.php');
	session_start();
	
	$usuario = @$_SESSION['usuario'];
	$plano = $_POST['plano_id'];	
	$cartao = $_POST['cartao_id'];

    $sql = "INSERT INTO conta VALUES (null, $usuario, $plano, $cartao)";
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/conta/create.php?status=1');
	} else {
			//echo mysqli_error($query);
            header('Location: ../../views/conta/create.php?status=2');
	}
	
	mysqli_close($con);
?>