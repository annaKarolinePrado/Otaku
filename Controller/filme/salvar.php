<?php
	include('../../conexao/conexao.php');
	
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
	
	
	$retorno['retorno'] = true;
	$retorno['mensagem'] = 'Operação realizada com sucesso!';
	
	echo json_encode($retorno);
	mysqli_close($con);
?>