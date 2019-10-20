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
			$id = $_GET['filmeId'];			
			
			$sql = "DELETE FROM filme WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/filme/index.php');
			} else {
					header('Location: ../../views/filme/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>