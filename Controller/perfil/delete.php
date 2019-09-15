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
			$id = $_GET['perfilId'];			
			
			$sql = "DELETE FROM perfil WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/perfil/index.php');
			} else {
					header('Location: ../../views/perfil/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>