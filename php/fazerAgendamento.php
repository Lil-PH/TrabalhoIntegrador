<?php
include('connect.php');
require_once('protect.php');

// Verificar se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Recuperar o ID do paciente da sessão
  $idPaciente = $_SESSION['id_paciente'];

  // Receber os dados do agendamento
  $procedimento = $_POST['procedimento'];
  $medico = $_POST['medico'];
  $data = $_POST['data'];
  $horario = $_POST['horario'];
  $consultaStatus = "Não confirmada";

  // Realizar as validações e sanitizações necessárias nos dados recebidos

  // Inserir o agendamento na tabela "agendamento"
  $sql = "INSERT INTO consulta (fk_id_paciente, fk_id_medico, fk_id_diaData, fk_id_horaDia, consulta_status)
          VALUES ('$idPaciente', '$medico', '$data', '$horario', '$consultaStatus')";

  if (mysqli_query($mysqli, $sql)) {
    // Agendamento realizado com sucesso
    $response = array('success' => true, 'message' => 'Agendamento realizado com sucesso.');
    echo json_encode($response);
  } else {
    // Erro ao realizar o agendamento
    $response = array('success' => false, 'message' => 'Erro ao realizar o agendamento.');
    echo json_encode($response);
  }
} else {
  // Requisição inválida
  $response = array('success' => false, 'message' => 'Requisição inválida.');
  echo json_encode($response);
}
?>