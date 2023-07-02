<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('connect.php');
require_once 'protect.php';

// Verifica se o ID da sessão corresponde a um paciente ou a um médico
if (isset($_SESSION['id_medico'])) {
    // Se for o ID de um médico, modifica a consulta para filtrar apenas as consultas do médico
    $idUsuario = $_SESSION['id_medico'];
    $sql = "SELECT c.id_consulta, p.nome_paciente, m.nome_medico, es.descricao_especialidade, d.diaAgenda, h.horario, c.consulta_status
            FROM consulta c
            INNER JOIN paciente p ON c.fk_id_paciente = p.id_paciente
            INNER JOIN medico m ON c.fk_id_medico = m.id_medico
            INNER JOIN especialidade es ON m.fk_id_especialidade = es.id_especialidade
            INNER JOIN dia_data d ON c.fk_id_diaData = d.id_diaData
            INNER JOIN hora_dia h ON c.fk_id_horaDia = h.id_horaDia
            WHERE c.fk_id_medico = $idUsuario";
} else {
    // Caso contrário, mantém a consulta original filtrando apenas as consultas do paciente
    $idUsuario = $_SESSION['id_paciente']; 
    $sql = "SELECT c.id_consulta, p.nome_paciente, m.nome_medico, es.descricao_especialidade, d.diaAgenda, h.horario, c.consulta_status
            FROM consulta c
            INNER JOIN paciente p ON c.fk_id_paciente = p.id_paciente
            INNER JOIN medico m ON c.fk_id_medico = m.id_medico
            INNER JOIN especialidade es ON m.fk_id_especialidade = es.id_especialidade
            INNER JOIN dia_data d ON c.fk_id_diaData = d.id_diaData
            INNER JOIN hora_dia h ON c.fk_id_horaDia = h.id_horaDia
            WHERE c.fk_id_paciente = $idUsuario";
}

// Executa a consulta
$result = $mysqli->query($sql);

// Array para armazenar os resultados
$consultas = [];

// Verifica se há resultados na consulta
if ($result->num_rows > 0) {
    // Itera sobre os resultados e armazena em um array
    while ($row = $result->fetch_assoc()) {
        $consultas[] = $row;
    }
}

// Verifica se o método HTTP utilizado é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o ID da consulta e o novo status enviado pelo cliente
    $idConsulta = $_POST['idConsulta'];
    $novoStatus = $_POST['novoStatus'];

    // Atualiza o status da consulta no banco de dados
    $updateSql = "UPDATE consulta SET consulta_status = '$novoStatus' WHERE id_consulta = '$idConsulta'";
    $updateResult = $mysqli->query($updateSql);

    // Verifica se a atualização foi bem-sucedida
    if ($updateResult) {
        // Retorna uma resposta de sucesso para o cliente
        echo json_encode(['status' => 'success']);
        exit;
    } else {
        // Retorna uma resposta de erro para o cliente
        $response = [
            'status' => 'error',
            'message' => 'Falha ao atualizar o status da consulta.'
        ];
        echo json_encode($response);
        exit;
    }
}


// Retorna os resultados como JSON
echo json_encode($consultas);
?>
