<?php
    include('../../conexao/conexao.php');



    $filtro = '';
    if ($nome[@$_POST['nome'] != '') {
        $filtro = "and duracao like '%".$nome."%'";
    }
    $sql =  "SELECT * FROM filme where 1 = 1 ".$filtro;
    $query = mysqli_query($con, $sql);
    
    $lista = [];
    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $lista[] = $item;
    }

    echo json_encode($lista);

    mysqli_close($con);           

?>    