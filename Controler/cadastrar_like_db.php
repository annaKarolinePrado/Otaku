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
			
			$nivel = $_POST['nivel'];
			$ativo = $_POST['ativo'];
			
			
			$sql = "INSERT INTO like VALUES (null, '$nivel', '$ativo')";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "nivel cadastrado com sucesso!";
			} else {
				echo "Não foi possível cadastrar o nivel. Erro: " . mysqli_error($query);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>
