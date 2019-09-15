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
			$login = $_POST['login'];			
			$senha = md5($_POST['senha']);			
			$perfil = $_POST['perfilId'];			
			
			$sql = "UPDATE usuario SET nome = '$nome', login = '$login', senha = '$senha', perfilId = $perfil WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: ../../views/usuario/index.php?status=1');
			} else {
				header('Location: ../../views/usuario/index.php?status=2');
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>