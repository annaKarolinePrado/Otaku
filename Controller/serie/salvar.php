<?php
	include('../../conexao/conexao.php');
	
	$nome = $_POST['nome'];	
	$produtora = $_POST['produtoraId'];	
	$categoria = $_POST['categoriaId'];	
	$gostei = $_POST['gosteiId'];	
	
    $sql = "INSERT INTO serie VALUES (null, '$nome', $produtora, $categoria, $gostei)";
	$query = mysqli_query($con, $sql);
	if($query) {
            header('Location: ../../views/serie/index.php?status=1');
	} else {
		echo mysqli_error($query);
             header('Location: ../../views/serie/index.php?status=2');
	}
	
	mysqli_close($con);
?>