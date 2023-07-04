<?php 
include('connect.php');

// Consultar a tabela "especialidade" para obter todas as especialidades ordenadas por descrição
$sql_query = "SELECT id_especialidade, descricao_especialidade FROM especialidade ORDER BY descricao_especialidade ASC";
$result = $mysqli->query($sql_query);

$especialidades = array();

while ($row = $result->fetch_assoc()) {
    // Criar um array para cada especialidade encontrada no resultado da consulta
    $especialidade = array(
        'id_especialidade' => $row['id_especialidade'],
        'descricao_especialidade' => $row['descricao_especialidade']
    );
    // Adicionar a especialidade ao array de especialidades
    $especialidades[] = $especialidade;
}

// Retornar as especialidades como uma resposta JSON
header('Content-Type: application/json');
echo json_encode($especialidades);
?>