<?php 

    include('banco.php');

    // $query = "SELECT horario_inici FROM horariodata";
    // $result = $conexao->query($query);

    // // Verificar se a consulta retornou resultados
    // if ($result->num_rows > 0) {
    //     include 'agendamento.php'; // Inclui o arquivo HTML do formulário
    // } else {
    //     echo "Não há horários disponíveis.";
    // }



    $sql_query = "SELECT especialidade_medico FROM medico ";
    $result = $mysqli->query($sql_query);

    $optionProcedimento = "";
    $optionData = "";
    $optionHora = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nomeProcedimento = $row["especialidade_medico"];
            $optionProcedimento .= "<option value=\"$nomeProcedimento\">$nomeProcedimento</option>";
        }
         
    } else {
            echo "Não há procedimentos disponíveis.";
    } //se a optionProcedimento for selecionada fara um select com essa info


?>