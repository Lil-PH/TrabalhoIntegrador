<?php

// colocar no ARQUIVO crudMedico.php Fazer funcoes
include('connect.php');
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
        $response = array(
            'success' => false,
            'message' => 'A senha é obrigatória para salvar as alterações.'
        );
        echo json_encode($response);
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
        $response = array(
            'success' => false,
            'message' => 'Tipo de usuário inválido.'
        );
        echo json_encode($response);
        exit();
    }

    // Consulta o banco de dados para obter a senha atual do usuário
    $sqlSenha = "SELECT $senhaCampo FROM $tabelaUsuario WHERE $idCampo='$idUsuario'";
    $resultadoSenha = $mysqli->query($sqlSenha);
    $rowSenha = $resultadoSenha->fetch_assoc();
    $senhaHash = $rowSenha[$senhaCampo]; // Senha atual armazenada no banco de dados

    // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
    if (!password_verify($senha, $senhaHash)) {
        $response = array(
            'success' => false,
            'message' => 'Senha incorreta. As alterações não foram salvas.'
        );
        echo json_encode($response);
        exit();
    }

    if (!empty($novaSenha) && $novaSenha !== $confirmarNovaSenha) {
        $response = array(
            'success' => false,
            'message' => 'A confirmação da nova senha não corresponde.'
        );
        echo json_encode($response);
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
        $response = array(
            'success' => true,
            'message' => 'Dados atualizados com sucesso.'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'success' => false,
            'message' => 'Erro ao atualizar os dados: ' . $mysqli->error
        );
        echo json_encode($response);
    }

} else {
    // Caso o formulário não tenha sido enviado, redireciona para a página de edição de conta
    header('Location: ../telaDoUser.php');
    exit();
}

?>