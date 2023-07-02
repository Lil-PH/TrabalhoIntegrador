<?php
include('./php/protect.php');
//include('./php/get_especialidades.php');
//include('./php/get_medicos.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agendamento Odontológico</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/agendar.css">
    <link rel="shortcut icon" href="./img/Dente.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" crossorigin="anonymous"></script>
	<!-- <script src="/get_agendamento.js"></script> -->
</head>
<body>

 	<!-- Este é um título para o formulário -->
    <h1>Agendamento Odontológico</h1>

	<?php
      
	  if (isset($_SESSION['nome_paciente'])) {
		$nome = $_SESSION['nome_paciente'];
		$cpf = $_SESSION['cpf_paciente'];
		$email = $_SESSION['email_paciente'];
		$telefone = $_SESSION['telefone_paciente'];
		// echo "Bem-vindo $nome!";

	  } elseif (isset($_SESSION['nome_medico'])) {
		$nome = $_SESSION['nome_medico'];
		$cpf = $_SESSION['cpf_medico'];
		$email = $_SESSION['email_medico'];
		$telefone = $_SESSION['telefone_medico'];
		// echo "Bem-vindo, Dr $nome!";

	  }
	  
	?>
		
	<!-- Este é o formulário para agendamento de consulta odontológica -->
	<form id="agendando" class ="formulario-agendamento" action="" method="POST">


		<a href="./telaDoUser.php"><button type="button" class="btn-Voltar">
            Voltar
        </button></a>

		<!-- Este rótulo e entrada solicitam o nome do paciente -->
		<label for="nome">Nome:</label>
		<input value="<?php echo $nome; ?>" id="nome" type="text" name="nome" disabled="" required><br>

		<!-- Esta etiqueta e entrada solicitam o CPF do paciente -->
		<label for="nome">CPF:</label>
		<input value="<?php echo $cpf; ?>" id="cpf" type="text" name="CPF" maxlength="14" disabled="" required><br>

		<!-- Este rótulo e entrada solicitam o e-mail do paciente -->
		<label for="email">E-mail:</label>
		<input value="<?php echo $email; ?>" id="email" type="email" name="email" disabled="" required><br>
		
		<!-- Este rótulo e entrada solicitam o telefone do paciente -->
		<label for="telefone">Telefone:</label>
		<input value="<?php echo $telefone; ?>" id="telefone" type="tel" name="telefone" disabled="" maxlength="14" onkeyup="mascara_telefone()" required><br>

		<!-- Este rótulo e selecione pergunte pelo tipo de agendamento -->
		<label for="procedimento">Procedimento:</label>
		<select id="select_especialidade" name="select_especialidade" required>
			<option value="">Selecione o Procedimento</option>

		</select><br>

		<!-- Este rótulo e selecione pergunte pelo dentista preferido do paciente -->
        <label for="doutor">Doutor:</label>
		<select id="select_medico" name="select_medico" required>
		<option value="">Selecione o Médico</option>

		</select><br>

		<!-- Este rótulo e entrada solicitam a data do compromisso -->
        <label for="data">Data:</label>
		<select id="select_data" name="select_data" required>
			<option value="">Selecione a data</option>

		</select><br>

		<!-- Este rótulo e entrada solicitam a hora do compromisso -->
        <label for="horario">Horário:</label>
		<select id="select_horario" name="select_horario" required>
			<option value="">Selecione o horário</option>
		</select><br>
		
		<!-- Este botão envia o formulário -->
		<button type="submit" class="button" >Agendar</button>
		
	</form>
	<script src="./js/get_agendamento.js"></script>
</body>
</html>
