<?php

	// colocar no ARQUIVO crudPaciente.php Fazer funcoes
include('banco.php');
include('protect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn-excluir'])) {
        $id = $_SESSION['id_paciente'];


        // Consulta o banco de dados para verificar se o médico possui dados relacionados em outras tabelas
        // (substitua "outra_tabela" pelo nome da tabela que você deseja verificar)
       
        // Executa a exclusão dos dados do médico
        $sql_exclusao = "DELETE FROM paciente WHERE id_paciente='$id'";
        if (mysqli_query($mysqli, $sql_exclusao)) {
            // Exclusão bem-sucedida
            $_SESSION['mensagem'] = "Dados excluídos com sucesso!";
            // Redireciona para a página adequada
            header('Location: ../index.php');
            exit();
        } else {
            // Erro ao excluir os dados
            $_SESSION['mensagem'] = "Erro ao excluir os dados: " . mysqli_error($mysqli);
            header('Location: ../erro.php');
            exit();
        }
    }
}


?>