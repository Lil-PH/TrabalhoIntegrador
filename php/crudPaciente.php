<?php
include('banco.php');

	// MUDAR NOME DOS POSTS PARA emailLogin & senhaLogin
if(isset($_POST['email1']) && isset($_POST['senha1'])) {

    if(strlen($_POST['email1']) == 0) {
          echo json_encode(array('success' => false, 'message' => 'Preencha seu email'));
    } else if(strlen($_POST['senha1']) == 0) {
            echo json_encode(array('success' => false, 'message' => 'Preencha sua senha'));
    } else {

        $email = $mysqli->real_escape_string($_POST['email1']);
        $senha = $mysqli->real_escape_string($_POST['senha1']);

        // Check if it's a patient login
        $sql_patient = "SELECT * FROM paciente WHERE email_paciente = '$email'";
        $result_patient = $mysqli->query($sql_patient) or die("Falha na execução do código SQL: " . $mysqli->error);
        $num_rows_patient = $result_patient->num_rows;

        // Check if it's a doctor login
        $sql_doctor = "SELECT * FROM medico WHERE crm_medico = '$email'";
        $result_doctor = $mysqli->query($sql_doctor) or die("Falha na execução do código SQL: " . $mysqli->error);
        $num_rows_doctor = $result_doctor->num_rows;


        if($num_rows_doctor == 1) {
            // Doctor login
            $doctor = $result_doctor->fetch_assoc();
            if(password_verify($senha, $doctor['senha_medico'])) {
                // Password verification successful
                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id_medico'] = $doctor['id_medico'];
                $_SESSION['nome_medico'] = $doctor['nome_medico'];
                $_SESSION['crm_medico'] = $doctor['crm_medico'];
                $_SESSION['email_medico'] = $doctor['email_medico'];
                $_SESSION['telefone_medico'] = $doctor['telefone_medico'];

                echo json_encode(array('success' => true, 'message' => 'Dados enviados com sucesso!'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
            }

        } else if($num_rows_patient == 1) {
            // Patient login
            $patient = $result_patient->fetch_assoc();
            if(password_verify($senha, $patient['senha_paciente'])) {
                // Password verification successful
                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id_paciente'] = $patient['id_paciente'];
                $_SESSION['nome_paciente'] = $patient['nome_paciente'];
                $_SESSION['cpf_paciente'] = $patient['cpf_paciente'];
                $_SESSION['email_paciente'] = $patient['email_paciente'];
                $_SESSION['telefone_paciente'] = $patient['telefone_paciente'];

                echo json_encode(array('success' => true, 'message' => 'Dados enviados com sucesso!'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
        }
    }
}
?>
