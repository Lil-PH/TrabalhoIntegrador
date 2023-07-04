<?php

    include('connect.php');
    include('validarCpf.php');
    
    // Verifica se as variáveis do formulário foram enviadas
    if (isset($_POST['emailCadastro']) || isset($_POST['cpfCadastro']) || isset($_POST['telefoneCadastro']) || isset($_POST['nomeCadastro']) || isset($_POST['senhaCadastro']) || isset($_POST['confirma_senha'])) {
        
        // Recebe os valores enviados pelo formulário
        $nomeCadastro = $mysqli->real_escape_string($_POST['nomeCadastro']);
        $telefoneCadastro = $mysqli->real_escape_string($_POST['telefoneCadastro']);
        $cpfCadastro = $mysqli->real_escape_string($_POST['cpfCadastro']);
        $emailCadastro = $mysqli->real_escape_string($_POST['emailCadastro']);
        $senhaCadastro = $mysqli->real_escape_string($_POST['senhaCadastro']);
    
        // Verifica se o email ou CPF já estão cadastrados no banco de dados
        $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro' OR cpf_paciente = '$cpfCadastro'";
        $resultEmail = $mysqli->query($sql);
    
        // Se já existe algum registro com o email ou CPF informados, retorna uma mensagem de erro
        if ($resultEmail->num_rows > 0) {
            $response = array(
                'success' => false,
                'message' => 'Email ou CPF já cadastrado!'
            );
            echo json_encode($response);
        } else {
            $confirma_senha = $mysqli->real_escape_string($_POST['confirma_senha']);
    
            // Verifica se a senha e a confirmação de senha coincidem
            if ($senhaCadastro == $confirma_senha) {
                // Valida o CPF usando a função validarCPF() (provavelmente definida no arquivo validarCpf.php incluído acima)
                if (validarCPF($cpfCadastro)) {
                    // Gera um hash da senha antes de armazená-la no banco de dados
                    $senhaCadastro = password_hash($senhaCadastro, PASSWORD_DEFAULT);
                    // Insere os dados do paciente no banco de dados
                    $sql = "INSERT INTO paciente (nome_paciente, telefone_paciente, cpf_paciente, email_paciente, senha_paciente) VALUES ('$nomeCadastro', '$telefoneCadastro', '$cpfCadastro', '$emailCadastro', '$senhaCadastro')";
                    // Executa a consulta SQL
                    if ($mysqli->query($sql) === TRUE) {
                        // Após o cadastro bem-sucedido, recupera os dados do paciente recém-cadastrado
                        $sql = "SELECT * FROM paciente WHERE email_paciente = '$emailCadastro'";
                        $resultSenha = $mysqli->query($sql);
    
                        // Inicia a sessão e define as variáveis de sessão para o paciente
                        if ($resultSenha->num_rows > 0) {
                            while ($row = $resultSenha->fetch_assoc()) {
                                session_start();
                                $_SESSION['id_paciente'] = $row['id_paciente'];
                                $_SESSION['nome_paciente'] = $row['nome_paciente'];
                                // Retorna uma mensagem de sucesso
                                $response = array(
                                    'success' => true,
                                    'message' => 'Cadastro realizado com sucesso!'
                                );
                                echo json_encode($response);
                            }
                        }
                    } else {
                        // Se ocorrer um erro ao inserir os dados no banco de dados, retorna uma mensagem de erro
                        $response = array(
                            'success' => false,
                            'message' => 'Erro: ' . $mysqli->error
                        );
                        echo json_encode($response);
                    }
                } else {
                    // Se o CPF não for válido, retorna uma mensagem de erro
                    $response = array(
                        'success' => false,
                        'message' => 'CPF inválido'
                    );
                    echo json_encode($response);
                }
            } else {
                // Se as senhas não coincidirem, retorna uma mensagem de erro
                $response = array(
                    'success' => false,
                    'message' => 'As senhas não coincidem'
                );
                echo json_encode($response);
            }
        }
    }

?>