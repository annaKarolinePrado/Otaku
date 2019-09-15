<?php
	include('conexcao/conexao.php');
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
				echo "Cartão cadastrado com sucesso!";
			} else {
				echo "Não foi possível cadastrar o cartão. Erro: " . mysqli_error($query);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>