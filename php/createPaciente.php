
<?php

    include('connect.php');
    include('validarCpf.php');
    
    if (isset($_POST['emailCadastro']) || isset($_POST['cpfCadastro']) || isset($_POST['telefoneCadastro']) || isset($_POST['nomeCadastro']) || isset($_POST['senhaCadastro']) || isset($_POST['confirma_senha'])) {
    
        $nomeCadastro = $_POST['nomeCadastro'];
        $telefoneCadastro = $_POST['telefoneCadastro'];
        $cpfCadastro = $_POST['cpfCadastro'];
        $emailCadastro = $_POST['emailCadastro'];
        $senhaCadastro = $_POST['senhaCadastro'];
    
        $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro' OR cpf_paciente = '$cpfCadastro'";
        $resultEmail = $mysqli->query($sql);
    
        if ($resultEmail->num_rows > 0) {
            $response = array(
                'success' => false,
                'message' => 'Email ou CPF já cadastrado!'
            );
            echo json_encode($response);
        } else {
            $confirma_senha = $_POST['confirma_senha'];
    
            if ($senhaCadastro == $confirma_senha) {
                // Validar o CPF
                if (validarCPF($cpfCadastro)) {
                    $senhaCadastro = password_hash($senhaCadastro, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO paciente (nome_paciente, telefone_paciente, cpf_paciente, email_paciente, senha_paciente) VALUES ('$nomeCadastro', '$telefoneCadastro', '$cpfCadastro', '$emailCadastro', '$senhaCadastro')";
    
                    if ($mysqli->query($sql) === TRUE) {
                        $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro'";
                        $resultSenha = $mysqli->query($sql);
    
                        if ($resultSenha->num_rows > 0) {
                            while ($row = $resultSenha->fetch_assoc()) {
                                session_start();
                                $_SESSION['id_paciente'] = $row['id_paciente'];
                                $_SESSION['nome_paciente'] = $row['nome_paciente'];
    
                                $response = array(
                                    'success' => true,
                                    'message' => 'Cadastro realizado com sucesso!'
                                );
                                echo json_encode($response);
                            }
                        }
                    } else {
                        $response = array(
                            'success' => false,
                            'message' => 'Erro: ' . $mysqli->error
                        );
                        echo json_encode($response);
                    }
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'CPF inválido'
                    );
                    echo json_encode($response);
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'As senhas não coincidem'
                );
                echo json_encode($response);
            }
        }
    }

?>