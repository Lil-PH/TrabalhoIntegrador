<?php
	//Conexão com banco de dados
	$servername="localhost"; //endereço do servidor
	$username="root";
	$password="";
	$db_name="odonto_db";
	$porta="3307";

	//pdo - somente orientado objeto

	// $mysqli = new mysqli($servername,$username,$password,$db_name,$porta);
	$mysqli = mysqli_connect($servername,$username,$password,$db_name,$porta);

	//codifica com o caracteres ao manipular dados do banco de dados
	//mysqli_set_charset($connect, "utf8");

	if($mysqli->error) {
		die("Falha ao conectar ao banco de dados: " . $mysqli->error);
	}
	mysqli_set_charset($mysqli, "utf8");
?>