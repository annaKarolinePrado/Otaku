<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			$id                = $_POST['id'];
			$nivel = $_POST['nivel'];
			$ativo = $_POST['ativo'];
			
			
			$sql = "UPDATE like SET nivel = '$nivel', ativo = '$ativo' WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Nivel alterado com sucesso!";
			} else {
				echo "Não foi possível alterar o nivel. Erro: " . mysqli_error($query);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>