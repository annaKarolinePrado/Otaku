<?php
	include('../../conexao/conexao.php');
?>
	<?php
		$id = $_GET['episodioId'];			
		
		$sql = "DELETE FROM episodio WHERE id = $id";
		
		$query = mysqli_query($con, $sql);
		if($query) {
			header('Location: ../../views/episodio/index.php');
		} else {
				header('Location: ../../views/episodio/index.php');
		}
	?>
<?php
	mysqli_close($con);
?>