<?php
    include('../../conexao/conexao.php');

    $sql =  "SELECT conta.id,plano.nome plano,cartao.titular cartao   FROM `conta` INNER join  plano on (plano.id = PLANO_ID) inner join cartao on ( cartao.id = CARTAO_ID)";
    $query = mysqli_query($con, $sql);
    
    $lista = [];
    while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $lista[] = $item;
    }

    echo json_encode($lista);

    mysqli_close($con);           

?>    