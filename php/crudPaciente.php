<?php
include('banco.php');

if(isset($_POST['email1']) || isset($_POST['senha1'])) {

    if(strlen($_POST['email1']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha1']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email_paciente = $mysqli->real_escape_string($_POST['email1']);
        $senha_paciente = $mysqli->real_escape_string($_POST['senha1']);
        // $hash = password_hash($senha_paciente, PASSWORD_DEFAULT);

        $sql_code = "SELECT * FROM paciente WHERE email_paciente = '$email_paciente' AND senha_paciente = '$senha_paciente'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $paciente = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_paciente'] = $paciente['id_paciente'];
            $_SESSION['nome_paciente'] = $paciente['nome_paciente'];

            header("Location: ../telaDoDoutor.php");
            

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }
}
?>