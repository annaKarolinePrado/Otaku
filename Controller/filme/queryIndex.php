<?php
    include('../../conexao/conexao.php');

    $sql =  "SELECT * FROM filme";
    $query = mysqli_query($con, $sql);
    
    $lista = [];
    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $lista[] = $item;
    }

    echo json_encode($lista);

    mysqli_close($con);           

?>    