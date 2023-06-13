<?php
include('banco.php');

$especialidadeSelecionada = $_GET['especialidade']; // Obtém a especialidade selecionada do parâmetro GET

$sql_query = $mysqli->prepare("SELECT id_medico, nome_medico FROM medico WHERE fk_id_especialidade = ?");
$sql_query->bind_param("s", $especialidadeSelecionada);
$sql_query->execute();
$result = $sql_query->get_result();

$medicos = array();

while ($row = $result->fetch_assoc()) {
    $medico = array(
        'id_medico' => $row['id_medico'],
        'nome_medico' => $row['nome_medico']
    );

    $medicos[] = $medico;
}

// Retornar os médicos como uma resposta JSON
header('Content-Type: application/json');
echo json_encode($medicos);
?>
