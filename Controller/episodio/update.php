<?php
	include('../../conexao/conexao.php');
?>
	<?php
		$id = $_POST['id'];	
		$nome = $_POST['nome'];	
		$temporada = $_POST['temporadaId'];						
		
		$sql = "UPDATE epsodio SET NOME = '$nome', TEMPORADAID = $temporada WHERE ID = $id";
		echo  $sql;
		$query = mysqli_query($con, $sql);
		
		if($query) {
			header('Location: ../../views/episodio/index.php?status=1');
		} else {
			//echo mysqli_error($query);
			header('Location: ../../views/episodio/index.php?status=2');
		}
	?>
<?php
	mysqli_close($con);
?>