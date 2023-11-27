<?php

	//Conexão com banco de dados
	$servername="sql201.infinityfree.com"; //Endereço do servidor
	$username="if0_35512066"; //Usuário do servidor
	$password="Lr9oonXNeGsDAI"; //Senha do servidor
	$db_name="if0_35512066_db_odonto"; //Nome do banco de dados
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
