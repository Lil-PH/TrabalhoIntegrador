<?php
// Conectar ao banco de dados
$host = "babar.db.elephantsql.com";
$user = "enxywrgz";
$password = "alRD-xN5PAIkBh93-MM_G1ySYYAMIzSC";
$dbname = "enxywrgz ";
$port = "5432";

// Conectando ao banco de dados
$conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
    echo "Não foi possível conectar ao banco de dados.";
    exit;
}

// Executar consultas SQL aqui...

// Encerrar a conexão
pg_close($conexao);
?>
