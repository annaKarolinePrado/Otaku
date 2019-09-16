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
			$id = $_POST['id'];
			$titular = $_POST['titular'];
			$numero = $_POST['numero'];
			$chaveSeguranca = $_POST['chaveSeguranca'];
			$usuarioId = $_POST['usuarioId'];
			
			
			$sql = "UPDATE cartao set titular = '$titular', numero = '$numero', chaveSeguranca = '$chaveSeguranca', usuarioId = '$usuarioId' where id = $idgit pull";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/cartao/index.php?status=1');
			} else {
				header('Location: ../../views/cartao/index.php?status=2');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>