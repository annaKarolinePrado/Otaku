<?php
	include('../../conexao/conexao.php');
?>
	<?php
		$id = $_GET['temporadaId'];			
		
		$sql = "DELETE FROM temporada WHERE id = $id";
		
		$query = mysqli_query($con, $sql);
		if($query) {
			header('Location: ../../views/temporada/index.php');
		} else {
				header('Location: ../../views/temporada/index.php');
		}
	?>
<?php
	mysqli_close($con);
?>