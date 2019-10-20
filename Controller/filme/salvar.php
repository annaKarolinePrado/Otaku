<?php
	include('../../conexao/conexao.php');
	/*
	$nome = $_POST['nome'];	
	$descricao = $_POST['descricao'];	
	$lancamentoDate = $_POST['lancamentoDate'];	
	$proutoraId = $_POST['produtoraId'];	
	$categoriaId = $_POST['categoriaId'];	
	$gosteiId = $_POST['gosteiId'];	
	
    $sql = "INSERT INTO filme VALUES (null, '$nome', '$descricao', '$lancamentoDate', $proutoraId, $categoriaId, $gosteiId)";
	echo $sql;
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/filme/create.php?status=1');
	} else {
		echo mysqli_error($query);
        ///header('Location: ../../views/filme/create.php?status=2');
	}
	*/
	
	$json = $_GET['json'];
	$lista = json_decode($json, true);
	
	if(empty($lista)) {
		$retorno['retorno'] = false;
		$retorno['mensagem'] = 'Erro de formato no JSON!';
		
		echo json_encode($retorno);
		exit;
	}
	
	foreach($lista as $item) {

		$nome = $item['nome'];	
		$descricao = $item['descricao'];	
		$lancamentoDate = $item['lancamentoDate'];	
		$proutoraId = $item['produtoraId'];	
		$categoriaId = $item['categoriaId'];	
		$gosteiId = $item['gosteiId'];

		$sql = "INSERT INTO filme VALUES (null, '$nome', '$descricao', '$lancamentoDate', $proutoraId, $categoriaId, $gosteiId)";
		$query = mysqli_query($con, $sql);
		if($query) {
				header('Location: ../../views/filme/create.php?status=1');
		} else {
			//echo mysqli_error($query);
			header('Location: ../../views/filme/create.php?status=2');
		}	
	}
	
	$retorno['retorno'] = true;
	$retorno['mensagem'] = 'Operação realizada com sucesso!';
	
	echo json_encode($retorno);
	mysqli_close($con);
?>