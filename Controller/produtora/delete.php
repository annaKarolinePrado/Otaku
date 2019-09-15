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
			$id = $_GET['produtoraId'];			
			
			$sql = "DELETE FROM produtora WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/produtora/index.php');
			} else {
					header('Location: ../../views/produtora/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>