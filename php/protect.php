<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_paciente'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"loginCadastro.php\">Entrar</a></p>");
}


?>