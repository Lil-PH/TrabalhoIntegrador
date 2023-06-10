<?php
include('banco.php');

if(isset($_POST['email1']) && isset($_POST['senha1'])) {

    if(strlen($_POST['email1']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha1']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email1']);
        $senha = $mysqli->real_escape_string($_POST['senha1']);

        // Check if it's a patient login
        $sql_patient = "SELECT * FROM paciente WHERE email_paciente = '$email' AND senha_paciente = '$senha'";
        $result_patient = $mysqli->query($sql_patient) or die("Falha na execução do código SQL: " . $mysqli->error);
        $num_rows_patient = $result_patient->num_rows;

        // Check if it's a doctor login
        $sql_doctor = "SELECT * FROM medico WHERE crm_medico = '$email' AND senha_medico = '$senha'";
        $result_doctor = $mysqli->query($sql_doctor) or die("Falha na execução do código SQL: " . $mysqli->error);
        $num_rows_doctor = $result_doctor->num_rows;


    if($num_rows_doctor == 1) {
        // Doctor login successful
        $doctor = $result_doctor->fetch_assoc();

        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id_medico'] = $doctor['id_medico'];
        $_SESSION['nome_medico'] = $doctor['nome_medico'];
        $_SESSION['crm_medico'] = $doctor['crm_medico'];
        $_SESSION['email_medico'] = $doctor['email_medico'];
        $_SESSION['telefone_medico'] = $doctor['telefone_medico'];

        header("Location: ../telaDoDoutor.php");

    }else if($num_rows_patient == 1) {
            // Patient login successful
            $patient = $result_patient->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_paciente'] = $patient['id_paciente'];
            $_SESSION['nome_paciente'] = $patient['nome_paciente'];
            $_SESSION['cpf_paciente'] = $patient['cpf_paciente'];
            $_SESSION['email_paciente'] = $patient['email_paciente'];
            $_SESSION['telefone_paciente'] = $patient['telefone_paciente'];

            header("Location: ../telaDoDoutor.php");

        // } else if($num_rows_doctor == 1) {
        //     // Doctor login successful
        //     $doctor = $result_doctor->fetch_assoc();

        //     if(!isset($_SESSION)) {
        //         session_start();
        //     }

        //     $_SESSION['id_medico'] = $doctor['id_medico'];
        //     $_SESSION['nome_medico'] = $doctor['nome_medico'];
        //     $_SESSION['crm_medico'] = $doctor['crm_medico'];
        //     $_SESSION['email_medico'] = $doctor['email_medico'];
        //     $_SESSION['telefone_medico'] = $doctor['telefone_medico'];

        //     header("Location: ../telaDoDoutor.php");

        }else {

            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}



































// if(isset($_POST['email1']) || isset($_POST['senha1'])) {

//     if(strlen($_POST['email1']) == 0) {
//         echo "Preencha seu e-mail";
//     } else if(strlen($_POST['senha1']) == 0) {
//         echo "Preencha sua senha";
//     } else {

//         $email_paciente = $mysqli->real_escape_string($_POST['email1']);
//         $senha_paciente = $mysqli->real_escape_string($_POST['senha1']);
//         // $hash = password_hash($senha_paciente, PASSWORD_DEFAULT);

//         $sql_code = "SELECT * FROM paciente WHERE email_paciente = '$email_paciente' AND senha_paciente = '$senha_paciente'";
//         $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

//         $quantidade = $sql_query->num_rows;

//         if($quantidade == 1) {
            
//             $paciente = $sql_query->fetch_assoc();

//             if(!isset($_SESSION)) {
//                 session_start();
//             }

//             $_SESSION['id_paciente'] = $paciente['id_paciente'];
//             $_SESSION['nome_paciente'] = $paciente['nome_paciente'];
//             $_SESSION['cpf_paciente'] = $paciente['cpf_paciente'];
//             $_SESSION['email_paciente'] = $paciente['email_paciente'];
//             $_SESSION['telefone_paciente'] = $paciente['telefone_paciente'];

//             header("Location: ../telaDoDoutor.php");
            

//         } else {
//             echo "Falha ao logar! E-mail ou senha incorretos";
//         }

//     }
// }
?>