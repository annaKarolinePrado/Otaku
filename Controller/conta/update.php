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
			$id   = $_POST['id'];
			$nome = $_POST['nome'];			
			$codigo = $_POST['codigo'];			
			$descricao = $_POST['descricao'];			
			$valor = $_POST['valor'];			
			
			$sql = "UPDATE plano SET nome = '$nome', codigo = $codigo, descricao = '$descricao', valor = $valor WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/plano/index.php?status=1');
			} else {
				header('Location: ../../views/plano/index.php?status=2');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>