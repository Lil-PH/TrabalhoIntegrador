<?php

// Obter os valores enviados por meio da requisição Ajax
// $medico = $_GET['medico'];

// Consulta SQL para obter as datas disponíveis com base no procedimento e médico selecionados
$sql = "SELECT DISTINCT id_diaData, diaAgenda
        FROM dia_data";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Array para armazenar as datas disponíveis
    $datas = array();

    // Percorrer os resultados e adicionar as datas ao array
    while ($row = $result->fetch_assoc()) {
        $data = array(
            'id_diaData' => $row['id_diaData'],
            'diaAgenda' => $row['diaAgenda']
        );
        $datas[] = $data;
    }

    // Retornar os resultados como JSON
    echo json_encode($datas);
} else {
    echo "Nenhuma data disponível";
}

?>