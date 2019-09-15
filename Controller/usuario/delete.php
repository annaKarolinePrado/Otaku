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
			$id = $_GET['usuarioId'];			
			
			$sql = "DELETE FROM usuario WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/usuario/index.php');
			} else {
					header('Location: ../../views/usuario/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>