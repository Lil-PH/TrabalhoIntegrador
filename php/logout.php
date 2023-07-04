<?php

// Verifica se a sessão não foi iniciada
if(!isset($_SESSION)) {
    session_start();
}

// Destroi a sessão atual
session_destroy();

// Redireciona o usuário para a página inicial
header("Location: ../index.php");