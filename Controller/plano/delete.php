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
			$id = $_GET['planoId'];			
			
			$sql = "DELETE FROM plano WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/plano/index.php');
			} else {
					header('Location: ../../views/plano/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>