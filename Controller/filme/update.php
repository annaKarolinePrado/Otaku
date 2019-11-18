<?php
	include('../../conexao/conexao.php');

	$id = $_POST['id'];
	$nome = $_POST['nome'];	
	$descricao = $_POST['duracao'];	
	$produtoraId = $_POST['produtoraId'];
	$lancamentoDate = $_POST['lancamentoDate'];	
		
	$categoriaId = $_POST['categoriaId'];	
	$gosteiId = @$_POST['gosteiId'];

	$sql = "UPDATE filme SET NOME = '$nome', DURACAO = '$descricao', LANCAMENTODATE = '$lancamentoDate', PRODUTORAID = $produtoraId, CATEGORIAID = $categoriaId, GOSTEI_ID = $gosteiId  WHERE id = $id";
	
	$query = mysqli_query($con, $sql);
	if($query) {
			header('Location: ../../views/filme/create.php?status=1');
	} else {
		//echo mysqli_error($query);
		header('Location: ../../views/filme/create.php?status=2');
	}
	
	echo json_encode($retorno);
	mysqli_close($con);
?>