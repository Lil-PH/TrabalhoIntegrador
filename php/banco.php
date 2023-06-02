<?php
	//Conexão com banco de dados
	$servername="sql113.epizy.com"; //endereço do servidor
	$username="epiz_34262060";
	$password="Hz9DF6KllYjGlWF";
	$db_name="epiz_34262060_teste";
	$porta="3306";

	//pdo - somente orientado objeto
	$connect = mysqli_connect($servername,$username,$password,$db_name,$porta);

	//codifica com o caracteres ao manipular dados do banco de dados
	//mysqli_set_charset($connect, "utf8");

	if(mysqli_connect_error()):
		echo "Falha na conexão: ". mysqli_connect_error();
	endif;
	mysqli_set_charset($connect, "utf8");
?>