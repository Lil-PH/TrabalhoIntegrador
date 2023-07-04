<?php

include('connect.php');

// Verifica se a solicitação é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores enviados pelo JavaScript
    $idConsulta = $_POST['idConsulta'];
    $novoStatus = $_POST['novoStatus'];

    // Prepare e execute a query para atualizar o status da consulta
    $stmt = $mysqli->prepare("UPDATE consulta SET consulta_status = ? WHERE id_consulta = ?");
    $stmt->bind_param("si", $novoStatus, $idConsulta);
    $stmt->execute();

    // Verifique se a atualização foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        // A atualização foi bem-sucedida
        echo json_encode(['success' => true]);
    } else {
        // A atualização falhou
        echo json_encode(['success' => false, 'message' => 'Falha ao atualizar o status da consulta']);
    }

} else {
    // A solicitação não é do tipo POST
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido']);
}
?>