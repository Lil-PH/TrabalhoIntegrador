<?php
include('banco.php');

// Obter o valor enviado por meio da requisição Ajax
$dataSelecionada = $_GET['data'];
$medicoSelecionado = $_GET['medico'];

// Consultar a tabela "hora_dia" para obter os horários disponíveis para a data e médico selecionados
$sql = "SELECT DISTINCT hora_dia.id_horaDia, hora_dia.horario
        FROM dia_data
        INNER JOIN hora_dia ON dia_data.id_diaData = hora_dia.fk_id_diaData
        LEFT JOIN consulta ON consulta.fk_id_diaData = dia_data.id_diaData
        WHERE dia_data.id_diaData = '$dataSelecionada'
        AND (consulta.fk_id_medico IS NULL OR consulta.fk_id_medico = '$medicoSelecionado')";

$resultado = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($resultado) > 0) {
  $horariosDisponiveis = array();

  while ($row = mysqli_fetch_assoc($resultado)) {
    $idHoraDia = $row['id_horaDia'];
    $hora = $row['horario'];


        // Verificar se o horário está disponível na tabela "agendamento"
        $sqlVerificar = "SELECT COUNT(*) AS total FROM consulta WHERE fk_id_horaDia = '$idHoraDia'";
        $resultadoVerificar = mysqli_query($mysqli, $sqlVerificar);
        $rowVerificar = mysqli_fetch_assoc($resultadoVerificar);
        $totalAgendado = $rowVerificar['total'];
    
        if ($totalAgendado == 0) {
          // Horário disponível, adicionar à lista
          $horariosDisponiveis[] = array(
            'id_horaDia' => $idHoraDia,
            'horario' => $hora
          );
        }
      }
    
      // Retornar os horários disponíveis como um JSON
      header('Content-Type: application/json');
      echo json_encode($horariosDisponiveis);
    } else {
      echo 'Nenhum horário disponível para a data selecionada.';
    }
?>