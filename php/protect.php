<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_paciente']) && !isset($_SESSION['id_medico'])) {
    die('<body style="background-color: #2E5575"><div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <p style="font-size: 2rem; color: red; text-align: center;">
      Você não pode acessar esta página porque não está logado. <a href="loginCadastro.php" style="color: blue; text-decoration: none;">Entrar</a>
    </p>
  </div></body>');


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