<?php
// Obter o valor enviado por meio da requisição Ajax
$data = $_GET['data'];

// Consulta SQL para obter os horários disponíveis com base na data selecionada
$sql = "SELECT id_consulta, horario
        FROM consulta
        WHERE fk_id_diaData = '$data'
        AND fk_id_paciente IS NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Array para armazenar os horários disponíveis
    $horarios = array();

    // Percorrer os resultados e adicionar os horários ao array
    while ($row = $result->fetch_assoc()) {
        $horario = array(
            'id_horario' => $row['id_consulta'],
            'horario' => $row['horario']
        );
        $horarios[] = $horario;
    }

    // Retornar os resultados como JSON
    echo json_encode($horarios);
} else {
    echo "Nenhum horário disponível";
}
?>