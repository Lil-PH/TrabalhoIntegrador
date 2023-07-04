<?php

	//Conexão com banco de dados
	$servername="sql203.infinityfree.com"; //Endereço do servidor
	$username="epiz_34261980"; //Usuário do servidor
	$password="NEcmRzm3lITCD6v"; //Senha do servidor
	$db_name="epiz_34261980_db_odonto"; //Nome do banco de dados
	$porta="3306"; //Porta que o banco de dados está localizado

	// Criando a conexão utilizando a extensão mysqli
	$mysqli = mysqli_connect($servername,$username,$password,$db_name,$porta);

	// Verificando se ocorreu algum erro na conexão
	if($mysqli->error) {
		die("Falha ao conectar ao banco de dados: " . $mysqli->error);
	}
	// Definindo o conjunto de caracteres a ser utilizado ao manipular dados do banco de dados
	mysqli_set_charset($mysqli, "utf8");
?>	