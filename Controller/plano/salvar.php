<?php
	include('../../conexao/conexao.php');
	
	$nome = $_POST['nome'];	
	$codigo = $_POST['codigo'];	
	$descricao = $_POST['descricao'];	
	$valor = $_POST['valor'];	
	
    $sql = "INSERT INTO plano VALUES (null, '$nome', $codigo, '$descricao', $valor)";
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/plano/create.php?status=1');
	} else {
            header('Location: ../../views/plano/create.php?status=2');
	}
	
	mysqli_close($con);
?>