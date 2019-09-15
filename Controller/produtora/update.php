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
			
			$sql = "UPDATE produtora SET nome = '$nome' WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/produtora/index.php?status=1');
			} else {
				header('Location: ../../views/produtora/index.php?status=2');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>