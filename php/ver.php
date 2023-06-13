<?php

include('banco.php');

// $sql_query = "SELECT especialidade_medico FROM medico  ";
// $result = $mysqli->query($sql_query);

// $optionProcedimento = "";
// $optionData = "";
// $optionHora = "";

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $nomeProcedimento = $row["especialidade_medico"];
//         $optionProcedimento .= "<option value=\"$nomeProcedimento\">$nomeProcedimento</option>";
//     }
     
// } else {
//         echo "Não há procedimentos disponíveis.";
// } //se a optionProcedimento for selecionada fara um select com essa info








// $dataSelecionada = $_POST['dataSelecionada'];

// Query SQL com condição
// $sql_query = "SELECT DISTINCT dataDia FROM horariodata";
// $resultData = $mysqli->query($sql_query);

// $sql = "SELECT * FROM horarioData WHERE dataDia = '$dataSelecionada'";
// $optionData = "";



// Verifica se a data foi enviada via POST
// if (isset($_POST['dataSelecionada'])) {
    // Obtém a data selecionada pelo usuário

    // Executa a consulta

    // if ($resultData->num_rows > 0) {
    //     while ($row = $resultData->fetch_assoc()) {
    //         $dataSelecionada = $row["dataDia"];
    //         $optionData .= "<option value=\"$dataSelecionada\">$dataSelecionada</option>";
    //     }
         
    // } else {
    //     echo "Não há procedimentos disponíveis.";
    // }



    


//     // Verifica se há resultados
//     if ($resultData->num_rows > 0) {
//         // Itera sobre os resultados
//         while($row = $resultData->fetch_assoc()) {
//             // Exibe os horários disponíveis para a data selecionada
//             echo "Horário Inicial: " . $row["horario_inicial"];
//         }
//     } else {
//         echo "Nenhum horário disponível para a data selecionada.";
//     }
// } else {
//     echo "Nenhuma data selecionada.";
// }


// . ", Horário Final: " . $row["horario_final"]. "<br>"

?>