<?php


// -- Primeiro, exclua os registros relacionados na tabela "consulta" que estão referenciando o registro na tabela "paciente"
// DELETE FROM consulta
// WHERE fk_id_paciente = valor_da_chave_do_paciente;

// -- Em seguida, exclua o registro original da tabela "paciente"
// DELETE FROM paciente
// WHERE id_paciente = valor_da_chave_do_paciente;



// Inclui o arquivo de conexão
require_once 'banco.php';
require_once 'protect.php';

// Verifica se o ID do registro está presente na sessão
if (isset($_SESSION['btn-deletar'])) {
    // Obtém o ID do registro da sessão
    $idPaciente = $_SESSION['id_paciente'];

    echo $_SESSION['id_paciente'];

    // Executa a consulta DELETE
    $sql = "DELETE FROM paciente WHERE id_paciente = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $idPaciente);
    $stmt->execute();

    header('Location: ../contaDeletada.php');
    // header('Location: ../loginCadastro.php');

    echo "Registro excluído com sucesso.";
} else {
    echo "ID do registro não encontrado na sessão.";
}

// Fecha a conexão
$mysqli->close();

?>