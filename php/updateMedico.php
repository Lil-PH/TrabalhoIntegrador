<?php

// colocar no ARQUIVO crudMedico.php Fazer funcoes

// include('banco.php');
// require_once 'protect.php';

// // Verifica se o formulário foi enviado
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Recupera os dados do formulário
//     $idUsuario = $_SESSION['id_usuario']; // Obtém o ID do usuário logado a partir da sessão
//     $nome = $_POST['nome'];
//     $telefone = $_POST['telefone'];
//     $email = $_POST['email'];
//     $novaSenha = $_POST['nova_senha'];
//     $senha = $_POST['confirma_senha'];

//     // Validação dos campos (adicionar as validações necessárias)
//     if (empty($senha)) {
//         $_SESSION['mensagem'] = "A senha é obrigatória para salvar as alterações.";
//         header('Location: ../telaDoUsuario.php'); // Redireciona para a página de edição de conta
//         exit();
//     }

//     // Verifica se o usuário é um médico
//     $sqlMedico = "SELECT id_medico, senha_medico FROM medico WHERE id_medico='$idUsuario'";
//     $resultadoMedico = mysqli_query($mysqli, $sqlMedico);

//     // Verifica se o usuário é um paciente
//     $sqlPaciente = "SELECT id_paciente, senha_paciente FROM paciente WHERE id_paciente='$idUsuario'";
//     $resultadoPaciente = mysqli_query($mysqli, $sqlPaciente);

//     // Verifica se o usuário é um médico
//     if ($rowMedico = mysqli_fetch_assoc($resultadoMedico)) {
//         $senhaHash = $rowMedico['senha_medico']; // Senha atual armazenada no banco de dados
//         $tabelaUsuario = 'medico';
//         $idCampo = 'id_medico';
//         $nomeCampo = 'nome_medico';
//         $telefoneCampo = 'telefone_medico';
//         $emailCampo = 'email_medico';
//         $senhaCampo = 'senha_medico';
//     }
//     // Verifica se o usuário é um paciente
//     elseif ($rowPaciente = mysqli_fetch_assoc($resultadoPaciente)) {
//         $senhaHash = $rowPaciente['senha_paciente']; // Senha atual armazenada no banco de dados
//         $tabelaUsuario = 'paciente';
//         $idCampo = 'id_paciente';
//         $nomeCampo = 'nome_paciente';
//         $telefoneCampo = 'telefone_paciente';
//         $emailCampo = 'email_paciente';
//         $senhaCampo = 'senha_paciente';
//     }
//     // Caso nenhum resultado seja encontrado, usuário inválido
//     else {
//         $_SESSION['mensagem'] = "Tipo de usuário inválido.";
//         header('Location: ../telaDoUsuario.php'); // Redireciona para a página de edição de conta
//         exit();
//     }

//     // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
//     if (!password_verify($senha, $senhaHash)) {
//         $_SESSION['mensagem'] = "Senha incorreta. As alterações não foram salvas.";
//         header('Location: editar_conta.php'); // Redireciona para a página de edição de conta
//         exit();
//     }

//     // Atualiza os dados na tabela do usuário apenas se os campos correspondentes forem preenchidos
//     $sql = "UPDATE $tabelaUsuario SET";
//     if (!empty($nome)) {
//         $sql .= " $nomeCampo='$nome',";
//     }
//     if (!empty($telefone)) {
//         $sql .= " $telefoneCampo='$telefone',";
//     }
//     if (!empty($email)) {
//         $sql .= " $emailCampo='$email',";
//     }
//     if (!empty($novaSenha)) {
//         $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
//         $sql .= " $senhaCampo='$novaSenhaHash',";
//     }
//     // Remove a vírgula extra no final da consulta SQL
//     $sql = rtrim($sql, ',');
//     $sql .= " WHERE $idCampo='$idUsuario'";

//     if (mysqli_query($mysqli, $sql)) {
//         $_SESSION['mensagem'] = "Dados atualizados com sucesso.";
//         header('Location: ../telaDoUsuario.php'); // Redireciona para a página da conta do usuário
//     } else {
//         $_SESSION['mensagem'] = "Erro ao atualizar os dados: " . mysqli_error($mysqli);
//         header('Location: ../telaDoUsuario2.php'); // Redireciona para a página de edição de conta
//     }

// } else {
//     // Caso o formulário não tenha sido enviado, redireciona para a página de edição de conta
//     header('Location: ../editar_conta.php');
//     exit();
// }



include('banco.php');
require_once('protect.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $novaSenha = $_POST['nova_senha'];
    $confirmarNovaSenha = $_POST['confirma_nova_senha'];
    $senha = $_POST['confirma_senha'];

    // Validação dos campos (adicionar as validações necessárias)
    if (empty($senha)) {
        $_SESSION['mensagem'] = "A senha é obrigatória para salvar as alterações.";
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página de edição de conta
        exit();
    }

    // Verifica se o usuário é um médico
    if (isset($_SESSION['id_medico'])) {
        $idUsuario = $_SESSION['id_medico'];
        $tabelaUsuario = 'medico';
        $idCampo = 'id_medico';
        $nomeCampo = 'nome_medico';
        $telefoneCampo = 'telefone_medico';
        $emailCampo = 'email_medico';
        $senhaCampo = 'senha_medico';
    }
    // Verifica se o usuário é um paciente
    elseif (isset($_SESSION['id_paciente'])) {
        $idUsuario = $_SESSION['id_paciente'];
        $tabelaUsuario = 'paciente';
        $idCampo = 'id_paciente';
        $nomeCampo = 'nome_paciente';
        $telefoneCampo = 'telefone_paciente';
        $emailCampo = 'email_paciente';
        $senhaCampo = 'senha_paciente';
    }
    // Caso nenhum resultado seja encontrado, usuário inválido
    else {
        $_SESSION['mensagem'] = "Tipo de usuário inválido.";
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página de edição de conta
        exit();
    }

    // Consulta o banco de dados para obter a senha atual do usuário
    $sqlSenha = "SELECT $senhaCampo FROM $tabelaUsuario WHERE $idCampo='$idUsuario'";
    $resultadoSenha = $mysqli->query($sqlSenha);
    $rowSenha = $resultadoSenha->fetch_assoc();
    $senhaHash = $rowSenha[$senhaCampo]; // Senha atual armazenada no banco de dados

    // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
    if (!password_verify($senha, $senhaHash)) {
        $_SESSION['mensagem'] = "Senha incorreta. As alterações não foram salvas.";
        header('Location: editar_conta1.php'); // Redireciona para a página de edição de conta
        exit();
    }

    if (!empty($novaSenha) && $novaSenha !== $confirmarNovaSenha) {
        $_SESSION['mensagem'] = "A confirmação da nova senha não corresponde.";
        header('Location: editar_conta.php'); // Redireciona para a página de edição de conta
        exit();
    }

    // Atualiza os dados na tabela do usuário apenas se os campos correspondentes forem preenchidos
    $sql = "UPDATE $tabelaUsuario SET";
    if (!empty($nome)) {
        $sql .= " $nomeCampo='$nome',";
    }
    if (!empty($telefone)) {
        $sql .= " $telefoneCampo='$telefone',";
    }
    if (!empty($email)) {
        $sql .= " $emailCampo='$email',";
    }
    if (!empty($novaSenha)) {
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sql .= " $senhaCampo='$novaSenhaHash',";
    }
    // Remove a vírgula extra no final da consulta SQL
    $sql = rtrim($sql, ',');
    $sql .= " WHERE $idCampo='$idUsuario'";

    if ($mysqli->query($sql)) {
        $_SESSION['mensagem'] = "Dados atualizados com sucesso.";
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página da conta do usuário
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar os dados: " . $mysqli->error;
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página de edição de conta
    }
}
// } else {
//     // Caso o formulário não tenha sido enviado, redireciona para a página de edição de conta
//     header('Location: ../editar2_conta.php');
//     exit();
// }

?>