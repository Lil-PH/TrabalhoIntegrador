<?php 
include('connect.php');

$sql_query = "SELECT id_especialidade, descricao_especialidade FROM especialidade ORDER BY descricao_especialidade ASC";
$result = $mysqli->query($sql_query);

$especialidades = array();

while ($row = $result->fetch_assoc()) {
    $especialidade = array(
        'id_especialidade' => $row['id_especialidade'],
        'descricao_especialidade' => $row['descricao_especialidade']
    );

    $especialidades[] = $especialidade;
}

// Retornar as especialidades como uma resposta JSON
header('Content-Type: application/json');
echo json_encode($especialidades);
?>