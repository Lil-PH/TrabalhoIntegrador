<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_paciente']) && !isset($_SESSION['id_medico'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"loginCadastro.php\">Entrar</a></p>");
}

if (isset($_SESSION['id_paciente'])) {
    $id = $_SESSION['id_paciente']; // Obter o ID do paciente da sessão e armazenar em uma variável
    $nome = $_SESSION['nome_paciente'];
    
} elseif (isset($_SESSION['id_medico'])) {
    $id = $_SESSION['id_medico']; // Obter o ID do médico da sessão e armazenar em uma variável
    $nome = $_SESSION['nome_medico'];
} else {
    $id = null; // Caso o ID não esteja definido na sessão
}

?>