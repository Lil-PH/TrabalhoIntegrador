<?php

// include('banco.php');

// if(isset($_POST['btn-salvar'])){
// 	$nome=mysqli_escape_string($mysqli, $_POST['nome']);
// 	$email=mysqli_escape_string($mysqli, $_POST['email']);
// 	$telefone=mysqli_escape_string($mysqli, $_POST['telefone']);
// 	$senha=mysqli_escape_string($mysqli, $_POST['senha']);
// 	$id = $_SESSION['id_medico'];

//     $senha = password_hash($novaSenha, PASSWORD_DEFAULT);
	
// 	$sql="UPDATE medico SET nome_medico='$nome', email_medico='$email', telefone_medico='$telefone', senha_medico='$senha' WHERE  id_medico='$id'";
// 	echo $sql;
// 	if(mysqli_query($mysqli,$sql)){
// 		$_SESSION['mensagem'] = "Atualizado com sucesso!";
// 		header('Location: ../telaDoDoutor.php');
//     } else {
// 		$_SESSION['mensagem'] = "Erro ao atualizar!";
// 		header('Location: ../telaDoDoutor.php');
//     }
// }



include('banco.php');
require_once 'protect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário (exemplo: nome e email)
    $id = $_SESSION['id_medico'];
	$nome=mysqli_escape_string($mysqli, $_POST['nome']);
	$email=mysqli_escape_string($mysqli, $_POST['email']);
    $telefone = mysqli_escape_string($mysqli, $_POST['telefone']);
    $senhaAtual = mysqli_escape_string($mysqli, $_POST['senha_atual']);
	$novaSenha = mysqli_escape_string($mysqli, $_POST['senha']);
	$confirmaSenha = mysqli_escape_string($mysqli, $_POST['confirma_senha']);

    // Consulta o banco de dados para obter a senha atual do médico
    $sqlSenha = "SELECT senha_medico FROM medico WHERE id_medico='$id'";
    $resultadoSenha = mysqli_query($mysqli, $sqlSenha);
    $rowSenha = mysqli_fetch_assoc($resultadoSenha);
    $senhaHash = $rowSenha['senha_medico']; // Senha atual armazenada no banco de dados

    // Verifica se a senha atual informada corresponde à senha armazenada no banco de dados
    if (!password_verify($senhaAtual, $senhaHash)) {
        $_SESSION['mensagem'] = "Senha atual incorreta!";
        header('Location: ../erroSenhaHASH.php');
        exit(); // Encerra o script
    }

    // Verifica se a nova senha e a confirmação de senha são iguais
    if ($novaSenha !== $confirmaSenha) {
        $_SESSION['mensagem'] = "A senha e a confirmação de senha não correspondem!";
        header('Location: ../erroSenha.php');
        exit(); // Encerra o script
    }

        // Atualiza os dados na tabela do usuário (exemplo)

        $sql = "UPDATE medico SET";

        // Adiciona as colunas na consulta SQL apenas se os campos correspondentes forem preenchidos
        if (!empty($nome)) {
            $sql .= " nome_medico='$nome',";
        }
        if (!empty($email)) {
            $sql .= " email_medico='$email',";
        }
        if (!empty($telefone)) {
            $sql .= " telefone_medico='$telefone',";
        }
        if (!empty($novaSenha)) {
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $sql .= " senha_medico='$senhaHash',";
        }

        // Remove a vírgula extra no final da consulta SQL
        $sql = rtrim($sql, ',');

        $sql .= " WHERE id_medico='$id'";

        if (mysqli_query($mysqli, $sql)) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../telaDoDoutor.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar!";
            header('Location: ../ErroAtualizar.php');
        }
}

?>