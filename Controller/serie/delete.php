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
			$id = $_GET['serieId'];			
			
			$sql = "DELETE FROM serie WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/serie/index.php');
			} else {
					header('Location: ../../views/serie/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>