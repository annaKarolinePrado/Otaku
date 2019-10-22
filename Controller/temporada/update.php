<?php
	include('../../conexao/conexao.php');
?>
	<?php
		$id = $_POST['id'];	
		$nome = $_POST['nome'];	
		$sequencial = $_POST['sequencial'];	
		$serie = $_POST['serieId'];				
		
		$sql = "UPDATE temporada SET NOME = '$nome', SEQUENCIAL = $sequencial, SERIEID = $serie WHERE ID = $id";

		$query = mysqli_query($con, $sql);
		
		if($query) {
			header('Location: ../../views/temporada/index.php?status=1');
		} else {
			//echo mysqli_error($query);
			header('Location: ../../views/temporada/index.php?status=2');
		}
	?>
<?php
	mysqli_close($con);
?>