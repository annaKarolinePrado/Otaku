<?php
	include('../../conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			$id   = $_POST['id'];
			$nome = $_POST['nome'];			
			$produtora = $_POST['produtoraId'];			
			$categoria = $_POST['categoriaId'];			
			$gostei = $_POST['gosteiId'];			
			
			$sql = "UPDATE serie SET nome = '$nome', produtoraId = $produtora, categoriaId = $categoria, gosteiId = $gostei WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/serie/index.php?status=1');
			} else {
				header('Location: ../../views/serie/index.php?status=2');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>