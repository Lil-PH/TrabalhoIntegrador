<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$medico = $_POST['medico'];
$data = $_POST['data'];
$horario = $_POST['horario'];

// Inserir dados no banco de dados
$sql = "INSERT INTO consultas (nome, email, telefone, medico, data, horario)
        VALUES ('$nome', '$email', '$telefone', '$medico', '$data', '$horario')";

if ($conn->query($sql) === TRUE) {
  echo "Agendamento de consulta realizado com sucesso!";
} else {
  echo "Erro ao agendar consulta: " . $conn->error;
}

$conn->close();
?>