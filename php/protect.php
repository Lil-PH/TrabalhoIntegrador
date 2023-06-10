<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_paciente']) && !isset($_SESSION['id_medico'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"loginCadastro.php\">Entrar</a></p>");
}

?>