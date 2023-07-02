<?php
include('connect.php');

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os dados da requisição POST
  $paciente = $_POST['paciente'];
  $medico = $_POST['medico'];
  $procedimento = $_POST['procedimento'];
  $data = $_POST['data'];
  $horario = $_POST['horario'];
  $newStatus = $_POST['newStatus'];

  // Atualiza o status no banco de dados
  $sql = "UPDATE consulta SET status = ? WHERE fk_id_paciente = ? AND fk_id_medico = ? AND fk_id_diaData = ? AND fk_id_horario = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("sssss", $newStatus, $paciente, $medico, $data, $horario);

  if ($stmt->execute()) {
    // Atualização bem-sucedida
    $response = array('success' => true, 'message' => 'Status atualizado com sucesso.');
  } else {
    // Erro ao atualizar o status
    $response = array('success' => false, 'message' => 'Erro ao atualizar o status: ' . $stmt->error);
  }


  // Retorna a resposta como JSON
  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  // Retorna um erro para requisições que não sejam do tipo POST
  $response = array('success' => false, 'message' => 'Método não permitido.');
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>