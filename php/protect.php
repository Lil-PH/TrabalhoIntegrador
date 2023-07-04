<?php

// Verifica se a sessão não foi iniciada
if(!isset($_SESSION)) {
    session_start();
}
// Verifica se o usuário não está logado como paciente nem como médico
if(!isset($_SESSION['id_paciente']) && !isset($_SESSION['id_medico'])) {
    // Se não estiver logado, exibe uma mensagem de erro e um link para a página de login
    die('<body style="background-color: #2E5575"><div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <p style="font-size: 2rem; color: red; text-align: center;">
      Você não pode acessar esta página porque não está logado. <a href="loginCadastro.php" style="color: blue; text-decoration: none;">Entrar</a>
    </p>
  </div></body>');


}
// Verifica se o usuário é um paciente
if (isset($_SESSION['id_paciente'])) {
    $id = $_SESSION['id_paciente']; // Obtém o ID do paciente da sessão e armazena em uma variável
    $nome = $_SESSION['nome_paciente']; // Obtém o nome do paciente da sessão e armazena em uma variável
// Verifica se o usuário é um médico
} elseif (isset($_SESSION['id_medico'])) {
    $id = $_SESSION['id_medico']; // Obtém o ID do médico da sessão e armazena em uma variável
    $nome = $_SESSION['nome_medico']; // Obtém o nome do médico da sessão e armazena em uma variável
} else {
    $id = null; // Caso o ID não esteja definido na sessão
}

?>