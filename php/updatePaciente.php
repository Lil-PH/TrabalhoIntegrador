<!-- <?php

// colocar no ARQUIVO crudPaciente.php Fazer funcoes
include('banco.php');
require_once 'protect.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $idUsuario = $_SESSION['id_paciente']; // Obtém o ID do usuário logado a partir da sessão
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $novaSenha = $_POST['nova_senha'];
    $senha = $_POST['confirma_senha'];

    // Validação dos campos (adicionar as validações necessárias)
    if (empty($senha)) {
        $_SESSION['mensagem'] = "A senha é obrigatória para salvar as alterações.";
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página de edição de conta
        exit();
    }

    // Consulta o banco de dados para obter a senha atual do usuário
    $sqlSenha = "SELECT senha_paciente FROM paciente WHERE id_paciente='$idUsuario'";
    $resultadoSenha = $mysqli->query($sqlSenha);
    $rowSenha = $resultadoSenha->fetch_assoc();
    $senhaHash = $rowSenha['senha_paciente']; // Senha atual armazenada no banco de dados

    // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
    if (!password_verify($senha, $senhaHash)) {
        $_SESSION['mensagem'] = "Senha incorreta. As alterações não foram salvas.";
        header('Location: editar_conta.php'); // Redireciona para a página de edição de conta
        exit();
    }

    // Atualiza os dados na tabela do usuário apenas se os campos correspondentes forem preenchidos
    $sql = "UPDATE paciente SET";
    if (!empty($nome)) {
        $sql .= " nome_paciente='$nome',";
    }
    if (!empty($telefone)) {
        $sql .= " telefone_paciente='$telefone',";
    }
    if (!empty($email)) {
        $sql .= " email_paciente='$email',";
    }
    if (!empty($novaSenha)) {
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sql .= " senha_paciente='$novaSenhaHash',";
    }
    // Remove a vírgula extra no final da consulta SQL
    $sql = rtrim($sql, ',');
    $sql .= " WHERE id_paciente='$idUsuario'";

    if ($mysqli->query($sql)) {
        $_SESSION['mensagem'] = "Dados atualizados com sucesso.";
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página da conta do usuário
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar os dados: " . $mysqli->error;
        header('Location: ../telaDoDoutor.php'); // Redireciona para a página de edição de conta
    }

}


?> -->