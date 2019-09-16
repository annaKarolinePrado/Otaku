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
			
			$titular = $_POST['titular'];
			$numero = $_POST['numero'];
			$chaveSeguranca = $_POST['chaveSeguranca'];
			$usuarioId = $_POST['usuarioId'];
			
			
			$sql = "INSERT INTO cartao VALUES (null, '$titular', '$numero','$chaveSeguranca','$usuarioId')";
			
			$query = mysqli_query($con, $sql);
			if($query) {
            header('Location: ../../views/cartao/create.php?status=1');
	} else {
            header('Location: ../../views/cartao/create.php?status=2');
	}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>