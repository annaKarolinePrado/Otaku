<?php
	include('conexao/conexao.php');
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
			
			
			$sql = "UPDATE cartao set titular = '$titular', numero = '$numero', chaveSeguranca = '$chaveSeguranca', usuarioId = '$usuarioId'";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Cartão atualizado com sucesso!";
			} else {
				echo "Não foi possível atualizar o cartão. Erro: " . mysqli_error($query);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>