<?php

include('connect.php');
// Obtém os dados enviados via POST pela requisição AJAX
$consulta = $_POST["consulta"];
$status = $_POST["status"];

// Atualiza o status no banco de dados
$sql = "UPDATE consulta SET consulta_status = '$status' WHERE id_consulta = '$consulta'";

if ($mysqli->query($sql) === TRUE) {
    $response = array("success" => true, 'message' => 'UPDATES COM SUSSS!');
    echo json_encode($response);
} else {
    $response = array("success" => false, "error" => $mysqli->error);
    echo json_encode($response);
}

?>