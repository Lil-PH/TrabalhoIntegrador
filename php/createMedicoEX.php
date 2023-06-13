<?php

    if(isset($_POST['emailCadastro']) || isset($_POST['cpfCadastro']) || isset($_POST['telefoneCadastro']) || isset($_POST['nomeCadastro']) || isset($_POST['senhaCadastro']) || isset($_POST['confirma_senha'])) {

        include('banco.php');
        include('cpf.php');

        $nomeCadastro = $_POST['nomeCadastro'];
        $telefoneCadastro = $_POST['telefoneCadastro'];
        $cpfCadastro = $_POST['cpfCadastro'];
        $emailCadastro = $_POST['emailCadastro'];
        $senhaCadastro = $_POST['senhaCadastro'];

        $sql = "SELECT * FROM medico WHERE email_medico = '$emailCadastro' OR cpf_medico = '$cpfCadastro'";
        $resultEmail = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($resultEmail) > 0) {
            echo "<script>alert('Email ou CPF já cadastrado!');</script>";
            echo "<script>window.location.href = '../loginCadastro.php';</script>";
        } else {
            $confirma_senha = $_POST['confirma_senha'];
            if ($senhaCadastro == $confirma_senha) {
                // Validar o CPF
                if (validarCPF($cpfCadastro)) {
                    $senhaCadastro = password_hash($senhaCadastro, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO medico (nome_medico, telefone_medico, cpf_medico, email_medico, senha_medico) VALUES ('$nomeCadastro', '$telefoneCadastro', '$cpfCadastro', '$emailCadastro', '$senhaCadastro')";
                    if ($mysqli->query($sql) === TRUE) {
                        echo "Cadastro realizado com sucesso!";
                        $sql = "SELECT * FROM medico WHERE email_medico = '$emailCadastro'";
                        $resultSenha = $mysqli->query($sql);
                        if ($resultSenha->num_rows > 0) {
                            while ($row = $resultSenha->fetch_assoc()) {
                                $_SESSION['id_medico'] = $row['id_medico'];
                                $_SESSION['nome_medico'] = $row['nome_medico'];
                                header('Location: ../loginCadastro.php');
                            }
                        }
                    } else {
                        echo "Erro: " . $sql . "<br>" . $mysqli->error;
                    }
                } else {
                    echo "CPF inválido";
                }
            }    
            
        }




        // $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro' OR cpf_paciente = '$cpfCadastro'";
        // $resultEmail = mysqli_query($mysqli, $sql);
        // if(mysqli_num_rows($resultEmail) > 0) {
        //     echo "<script>alert('Email ou CPF já cadastrado!');</script>";
        //     echo "<script>window.location.href = '../loginCadastro.php';</script>";
        
        // } else {
            
        //     $confirma_senha = $_POST['confirma_senha'];
        //     if($senhaCadastro == $confirma_senha) {
        //         $senhaCadastro = password_hash($senhaCadastro, PASSWORD_DEFAULT);
        //         $sql = "INSERT INTO paciente (nome_paciente, telefone_paciente, cpf_paciente, email_paciente, senha_paciente) VALUES ('$nomeCadastro', '$telefoneCadastro', '$cpfCadastro', '$emailCadastro', '$senhaCadastro')";
        //         if($mysqli->query($sql) === TRUE) {
        //             echo "Cadastro realizado com sucesso!";
        //             $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro'";
        //             $resultSenha = $mysqli->query($sql);
        //             if ($resultSenha->num_rows > 0) {
        //                 while($row = $resultSenha->fetch_assoc()) {
        //                     $_SESSION['id_paciente'] = $row['id_paciente'];
        //                     $_SESSION['nome_paciente'] = $row['nome_paciente'];
        //                     header('Location: ../loginCadastro.php');
        //                 }
        //             }
        //         } else {
        //             echo "Erro: " . $sql . "<br>" . $mysqli->error;
        //         }

        //     }


        //     if(mysqli_query($mysqli, $sql)) {
        //         echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        //         echo "<script>window.location.href = '../loginCadastro.php';</script>";
        //     } else {
        //             echo "<script>alert('Erro ao cadastrar!');</script>";
        //             echo "<script>window.location.href = '../loginCadastro.php';</script>";
        //     }
        // }

        // senhaCadastro sera cryptografada no banco


        //se o emailCadastro for o mesmo do email_paciente do banco de dados nao sera armazenado

    
    }
?>