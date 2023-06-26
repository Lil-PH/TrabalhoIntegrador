<?php

include('banco.php');

$medicoSelecionado = $_GET['medico'];

// Consultar a tabela "consulta" para obter as datas agendadas para o médico selecionado
$sql_g = "SELECT DISTINCT fk_id_horaDia FROM consulta WHERE fk_id_medico = '$medicoSelecionado'";
$resultado = mysqli_query($mysqli, $sql_g);

$datasAgendadas = array();

if ($resultado && mysqli_num_rows($resultado) > 0) {
  while ($row = mysqli_fetch_assoc($resultado)) {
    $datasAgendadas[] = $row['fk_id_horaDia'];
  }
}

// Consultar a tabela "dia_data" para obter todas as datas
$sql = "SELECT id_diaData, diaAgenda FROM dia_data";
$resultado = mysqli_query($mysqli, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
  $datasDisponiveis = array();

  while ($row = mysqli_fetch_assoc($resultado)) {
    $idDiaData = $row['id_diaData'];
    $data = $row['diaAgenda'];

    // Verificar se a data não está nas datas agendadas
    if (!in_array($idDiaData, $datasAgendadas)) {
      $datasDisponiveis[] = array('id_diaData' => $idDiaData, 'diaAgenda' => $data);
    }
  }

  // Retornar todas as datas disponíveis como um JSON
  header('Content-Type: application/json');
  echo json_encode($datasDisponiveis);
} else {
  echo 'Nenhuma data disponível.';
}

?>

