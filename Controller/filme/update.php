<?php
	include('../../conexao/conexao.php');

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

		$sql = "UPDATE filme SET nome = '$nome', duracao = '$descricao', lancamentoDate = '$lancamentoDate', proutoraId = $produtoraId, categoriaId = $categoriaId, gostei_Id = $gosteiId  WHERE id = $id";
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