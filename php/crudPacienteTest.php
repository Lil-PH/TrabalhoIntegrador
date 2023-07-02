<?php

include('connect.php');

// Função para criar um paciente
function createPaciente() {
    include('connect.php');
    include('validarCpf.php');
    include('protect.php');

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
            return;
        }

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'create') {
            createPaciente();
        }
    }
}



// // Função para login dos Usuarios
// function loginUsuario() {

//     include('connect.php');
//     include('validarCpf.php');
//     include('protect.php');


//     if(isset($_POST['emailLogin']) && isset($_POST['senhaLogin'])) {

//         if(strlen($_POST['emailLogin']) == 0) {
//             echo json_encode(array('success' => false, 'message' => 'Preencha seu email'));
//         } else if(strlen($_POST['senhaLogin']) == 0) {
//                 echo json_encode(array('success' => false, 'message' => 'Preencha sua senha'));
//         } else {

//             $email = $mysqli->real_escape_string($_POST['emailLogin']);
//             $senha = $mysqli->real_escape_string($_POST['senhaLogin']);

//             // Check if it's a patient login
//             $sql_patient = "SELECT * FROM paciente WHERE email_paciente = '$email'";
//             $result_patient = $mysqli->query($sql_patient) or die("Falha na execução do código SQL: " . $mysqli->error);
//             $num_rows_patient = $result_patient->num_rows;

//             // Check if it's a doctor login
//             $sql_doctor = "SELECT * FROM medico WHERE crm_medico = '$email'";
//             $result_doctor = $mysqli->query($sql_doctor) or die("Falha na execução do código SQL: " . $mysqli->error);
//             $num_rows_doctor = $result_doctor->num_rows;


//             if($num_rows_doctor == 1) {
//                 // Doctor login
//                 $doctor = $result_doctor->fetch_assoc();
//                 if(password_verify($senha, $doctor['senha_medico'])) {
//                     // Password verification successful
//                     if(!isset($_SESSION)) {
//                         session_start();
//                     }

//                     $_SESSION['id_medico'] = $doctor['id_medico'];
//                     $_SESSION['nome_medico'] = $doctor['nome_medico'];
//                     $_SESSION['crm_medico'] = $doctor['crm_medico'];
//                     $_SESSION['email_medico'] = $doctor['email_medico'];
//                     $_SESSION['telefone_medico'] = $doctor['telefone_medico'];

//                     echo json_encode(array('success' => true, 'message' => 'Login realizado com sucesso!'));
//                 } else {
//                     echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
//                 }

//             } else if($num_rows_patient == 1) {
//                 // Patient login
//                 $patient = $result_patient->fetch_assoc();
//                 if(password_verify($senha, $patient['senha_paciente'])) {
//                     // Password verification successful
//                     if(!isset($_SESSION)) {
//                         session_start();
//                     }

//                     $_SESSION['id_paciente'] = $patient['id_paciente'];
//                     $_SESSION['nome_paciente'] = $patient['nome_paciente'];
//                     $_SESSION['cpf_paciente'] = $patient['cpf_paciente'];
//                     $_SESSION['email_paciente'] = $patient['email_paciente'];
//                     $_SESSION['telefone_paciente'] = $patient['telefone_paciente'];

//                     echo json_encode(array('success' => true, 'message' => 'Login realizado com sucesso!'));
//                 } else {
//                     echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
//                 }
//             } else {
//                 echo json_encode(array('success' => false, 'message' => 'Falha ao logar! E-mail ou senha incorretos'));
//             }
//         }
//     }


// }


// // Função para atualizar os dados dos Usuarios
// function updateUsuario() {

//     include('connect.php');
//     // include('validarCpf.php');
//     require_once('protect.php');

//     // Verifica se o formulário foi enviado
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         // Recupera os dados do formulário
//         $nome = $_POST['nome'];
//         $telefone = $_POST['telefone'];
//         $email = $_POST['email'];
//         $novaSenha = $_POST['nova_senha'];
//         $confirmarNovaSenha = $_POST['confirma_nova_senha'];
//         $senha = $_POST['confirma_senha'];

//         // Validação dos campos (adicionar as validações necessárias)
//         if (empty($senha)) {
//             $_SESSION['mensagem'] = "A senha é obrigatória para salvar as alterações.";
//             header('Location: ../telaUser.php'); // Redireciona para a página de edição de conta
//             exit();
//         }

//         // Verifica se o usuário é um médico
//         if (isset($_SESSION['id_medico'])) {
//             $idUsuario = $_SESSION['id_medico'];
//             $tabelaUsuario = 'medico';
//             $idCampo = 'id_medico';
//             $nomeCampo = 'nome_medico';
//             $telefoneCampo = 'telefone_medico';
//             $emailCampo = 'email_medico';
//             $senhaCampo = 'senha_medico';
//         }
//         // Verifica se o usuário é um paciente
//         elseif (isset($_SESSION['id_paciente'])) {
//             $idUsuario = $_SESSION['id_paciente'];
//             $tabelaUsuario = 'paciente';
//             $idCampo = 'id_paciente';
//             $nomeCampo = 'nome_paciente';
//             $telefoneCampo = 'telefone_paciente';
//             $emailCampo = 'email_paciente';
//             $senhaCampo = 'senha_paciente';
//         }
//         // Caso nenhum resultado seja encontrado, usuário inválido
//         else {
//             $_SESSION['mensagem'] = "Tipo de usuário inválido.";
//             header('Location: ../telaUser.php'); // Redireciona para a página de edição de conta
//             exit();
//         }

//         // Consulta o banco de dados para obter a senha atual do usuário
//         $sqlSenha = "SELECT $senhaCampo FROM $tabelaUsuario WHERE $idCampo='$idUsuario'";
//         $resultadoSenha = $mysqli->query($sqlSenha);
//         $rowSenha = $resultadoSenha->fetch_assoc();
//         $senhaHash = $rowSenha[$senhaCampo]; // Senha atual armazenada no banco de dados

//         // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
//         if (!password_verify($senha, $senhaHash)) {
//             $_SESSION['mensagem'] = "Senha incorreta. As alterações não foram salvas.";
//             header('Location: ../telaUser.php'); // Redireciona para a página de edição de conta
//             exit();
//         }

//         if (!empty($novaSenha) && $novaSenha !== $confirmarNovaSenha) {
//             $_SESSION['mensagem'] = "A confirmação da nova senha não corresponde.";
//             header('Location: ../telaUser.php'); // Redireciona para a página de edição de conta
//             exit();
//         }

//         // Atualiza os dados na tabela do usuário apenas se os campos correspondentes forem preenchidos
//         $sql = "UPDATE $tabelaUsuario SET";
//         if (!empty($nome)) {
//             $sql .= " $nomeCampo='$nome',";
//         }
//         if (!empty($telefone)) {
//             $sql .= " $telefoneCampo='$telefone',";
//         }
//         if (!empty($email)) {
//             $sql .= " $emailCampo='$email',";
//         }
//         if (!empty($novaSenha)) {
//             $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
//             $sql .= " $senhaCampo='$novaSenhaHash',";
//         }
//         // Remove a vírgula extra no final da consulta SQL
//         $sql = rtrim($sql, ',');
//         $sql .= " WHERE $idCampo='$idUsuario'";

//         if ($mysqli->query($sql)) {
//             $_SESSION['mensagem'] = "Dados atualizados com sucesso.";
//             header('Location: ../telaUser.php'); // Redireciona para a página da conta do usuário
//         } else {
//             $_SESSION['mensagem'] = "Erro ao atualizar os dados: " . $mysqli->error;
//             header('Location: ../telaUser.php'); // Redireciona para a página de edição de conta
//         }

//     } else {
//         // Caso o formulário não tenha sido enviado, redireciona para a página de edição de conta
//         header('Location: ../telaUser.php');
//         exit();
//     }

// }

// // Função para excluir um paciente
// function deleteUsuario() {

//     include('connect.php');
//     include('validarCpf.php');
//     include('protect.php');

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         if (isset($_POST['btn-excluir'])) {
//             $id = $_SESSION['id_paciente'];

//             // Consulta o banco de dados para verificar se o paciente possui dados relacionados em outras tabelas
//             // (substitua "outra_tabela" pelo nome da tabela que você deseja verificar)
//             // ...

//             // Executa a exclusão dos dados do paciente
//             $sql_exclusao = "DELETE FROM paciente WHERE id_paciente='$id'";
//             if (mysqli_query($mysqli, $sql_exclusao)) {
//                 // Exclusão bem-sucedida
//                 $_SESSION['mensagem'] = "Dados excluídos com sucesso!";
//                 // Redireciona para a página adequada
//                 header('Location: ../index.php');
//                 exit();
//             } else {
//                 // Erro ao excluir os dados
//                 $_SESSION['mensagem'] = "Erro ao excluir os dados: " . mysqli_error($mysqli);
//                 header('Location: ../erro.php');
//                 exit();
//             }
//         }
//     }
// }

// Verifica qual ação deve ser executada
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['action'])) {
//         $action = $_POST['action'];
//         if ($action === 'create') {
//             createPaciente();
//         } 
        // elseif ($action === 'login') {
        //     loginUsuario();
        // } elseif ($action === 'update') {
        //     updateUsuario();
        // } elseif ($action === 'delete') {
        //     deleteUsuario();
        // }
//     }
// }
?>