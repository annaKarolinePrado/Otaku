<?php
	include('../../conexao/conexao.php');
?>
	<?php
		$id = $_POST['id'];	
		$nome = $_POST['nome'];	
		$temporada = $_POST['temporada'];	
		$serie = $_POST['serieId'];				
		
		$sql = "UPDATE episodio SET NOME = '$nome', TEMPORADA = $temporada WHERE ID = $id";

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