<?php


// -- Primeiro, exclua os registros relacionados na tabela "consulta" que estão referenciando o registro na tabela "paciente"
// DELETE FROM consulta
// WHERE fk_id_paciente = valor_da_chave_do_paciente;

// -- Em seguida, exclua o registro original da tabela "paciente"
// DELETE FROM paciente
// WHERE id_paciente = valor_da_chave_do_paciente;



// Inclui o arquivo de conexão
// require_once 'banco.php';
// require_once 'protect.php';

// // Verifica se o ID do registro está presente na sessão
// if (isset($_SESSION['btn-deletar'])) {
//     // Obtém o ID do registro da sessão
//     $idPaciente = $_SESSION['id_paciente'];

//     echo $_SESSION['id_paciente'];

//     // Executa a consulta DELETE
//     $sql = "DELETE FROM paciente WHERE id_paciente = ?";
//     $stmt = $mysqli->prepare($sql);
//     $stmt->bind_param("i", $idPaciente);
//     $stmt->execute();

//     header('Location: ../contaDeletada.php');
//     // header('Location: ../loginCadastro.php');

//     echo "Registro excluído com sucesso.";
// } else {
//     echo "ID do registro não encontrado na sessão.";
// }

// // Fecha a conexão
// $mysqli->close();

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