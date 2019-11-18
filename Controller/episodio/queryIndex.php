<?php
    include('../../conexao/conexao.php');

    $sql =  "SELECT temporada.NOME temporada, epsodio.* FROM epsodio inner join temporada on (epsodio.TEMPORADAID = temporada.ID)";
    $query = mysqli_query($con, $sql);
    
    $lista = [];
    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $lista[] = $item;
    }

    echo json_encode($lista);

    mysqli_close($con);           

?>    