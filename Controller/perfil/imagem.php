<?php
	session_start();
	include('../../conexao/conexao.php');
	
	$imagem = $_FILES['imagem'];	
	$usuarioLogado = @$_SESSION['usuario'];	

	if ($imagem['tmp_name'] != '') {
		$arquivo   = explode('.', $imagem['name']);
		$tmp       = $imagem['tmp_name'];
		$novo_nome = 'user'.$usuarioLogado.'.'.$arquivo[1];

		if (!move_uploaded_file($tmp, '../../img/usuario/' . $novo_nome)) {
			echo "Não foi possível fazer upload do arquivo!";
			header('Location: ../../views/perfil/create.php?status=3');
			exit;
		}else{
			header('Location: ../../views/perfil/create.php');
		}
	}
	
	mysqli_close($con);
?>