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
			$id = $_GET['categoriaId'];			
			
			$sql = "DELETE FROM categoria WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/categoria/index.php');
			} else {
					header('Location: ../../views/categoria/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>