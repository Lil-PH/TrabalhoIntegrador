<?php
include('connect.php');

//Verfica se o campo email e o campo senha existem
if(isset($_POST['emailLogin']) && isset($_POST['senhaLogin'])) {

    if(strlen($_POST['emailLogin']) == 0) {
          // Verifica se o campo de email está vazio  
          echo json_encode(array('success' => false, 'message' => 'Preencha seu email'));
    } else if(strlen($_POST['senhaLogin']) == 0) {
            // Verifica se o campo de senha está vazio        
            echo json_encode(array('success' => false, 'message' => 'Preencha sua senha'));
    } else {

        $email = $mysqli->real_escape_string($_POST['emailLogin']);
        $senha = $mysqli->real_escape_string($_POST['senhaLogin']);

        // Verifica se é um login de paciente
        $sql_patient = "SELECT * FROM paciente WHERE email_paciente = '$email'";
        $result_patient = $mysqli->query($sql_patient) or die("Falha na execução do código SQL: " . $mysqli->error);
        $num_rows_patient = $result_patient->num_rows;

        // Verifica se é um login de médico
        $sql_doctor = "SELECT * FROM medico WHERE crm_medico = '$email'";
        $result_doctor = $mysqli->query($sql_doctor) or die("Falha na execução do código SQL: " . $mysqli->error);
        $num_rows_doctor = $result_doctor->num_rows;


        if($num_rows_doctor == 1) {
            // Login de médico
            $doctor = $result_doctor->fetch_assoc();
            if(password_verify($senha, $doctor['senha_medico'])) {
                // Verificação de senha bem-sucedida
                if(!isset($_SESSION)) {
                    session_start();
                }

                // Define as variáveis de sessão para o médico
                $_SESSION['id_medico'] = $doctor['id_medico'];
                $_SESSION['nome_medico'] = $doctor['nome_medico'];
                $_SESSION['cpf_medico'] = $doctor['cpf_medico'];
                $_SESSION['crm_medico'] = $doctor['crm_medico'];
                $_SESSION['email_medico'] = $doctor['email_medico'];
                $_SESSION['telefone_medico'] = $doctor['telefone_medico'];

                echo json_encode(array('success' => true, 'message' => 'Login realizado com sucesso!'));
            } else {
                // Senha incorreta para o médico
                echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
            }

        } else if($num_rows_patient == 1) {
            // Login de paciente
            $patient = $result_patient->fetch_assoc();
            if(password_verify($senha, $patient['senha_paciente'])) {
                // Verificação de senha bem-sucedida
                if(!isset($_SESSION)) {
                    session_start();
                }

                // Define as variáveis de sessão para o paciente
                $_SESSION['id_paciente'] = $patient['id_paciente'];
                $_SESSION['nome_paciente'] = $patient['nome_paciente'];
                $_SESSION['cpf_paciente'] = $patient['cpf_paciente'];
                $_SESSION['email_paciente'] = $patient['email_paciente'];
                $_SESSION['telefone_paciente'] = $patient['telefone_paciente'];

                echo json_encode(array('success' => true, 'message' => 'Login realizado com sucesso!'));
            } else {
                // Senha incorreta para o paciente
                echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
            }
        } else {
            // E-mail não encontrado para nenhum tipo de login
            echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
        }
    }
}
?>
