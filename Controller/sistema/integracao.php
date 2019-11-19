<?php	
    include('../../conexao/conexao.php');
    
	$json = $_GET['json'];
	$lista = json_decode($json, true);
	
	if(empty($lista)) {
		$retorno['retorno'] = false;
		$retorno['mensagem'] = 'Erro de formato no JSON!';
		
		echo json_encode($retorno);
		exit;
	}
	
	foreach($lista as $item) {
		$id = $item['id'];
		$nome = $item['nome'];
        $sql = "INSERT INTO categoria VALUES (null, '$nome')";
        $query = mysqli_query($con, $sql);
		//Fazer integração com o banco
	}
	
	$retorno['retorno'] = true;
	$retorno['mensagem'] = 'Operação realizada com sucesso!';
	
	echo json_encode($retorno);
	
	mysqli_close($con);
?>