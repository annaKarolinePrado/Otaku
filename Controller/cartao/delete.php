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
			
			$sql = "delete from cartao where id = '$id'";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/cartao/index.php');
			} else {
					header('Location: ../../views/cartao/index.php');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>