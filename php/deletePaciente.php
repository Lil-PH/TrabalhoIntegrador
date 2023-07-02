<?php

	// colocar no ARQUIVO crudPaciente.php Fazer funcoes
include('connect.php');
include('protect.php');

if (isset($_POST['btn-excluir'])) {
    $id = $_SESSION['id_paciente'];

    // Executa a exclusão dos dados do médico
    $sql_exclusao = "DELETE FROM paciente WHERE id_paciente='$id'";
    if (mysqli_query($mysqli, $sql_exclusao)) {
        // Exclusão bem-sucedida
        $response = array(
            'success' => true,
            'message' => 'Os dados do paciente foram excluídos com sucesso!'
        );
    } else {
        // Erro ao excluir os dados
        $response = array(
            'success' => false,
            'message' => 'Erro ao excluir os dados: ' . mysqli_error($mysqli)
        );
    }

    // Retorna a resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

?>