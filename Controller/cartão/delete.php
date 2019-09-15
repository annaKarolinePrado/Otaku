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
			
			$id = $_POST['id'];
			
			$sql = "delete from cartao where id = '$id'";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Cartão excluido com sucesso!";
			} else {
				echo "Não foi possível excluir o cartão. Erro: " . mysqli_error($query);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>