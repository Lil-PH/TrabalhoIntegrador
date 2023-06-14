<?php
include('./php/protect.php');
// include('./php/get_especialidades.php');
// include('./php/get_medicos.php');

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

	<!-- Este é o formulário para agendamento de consulta odontológica -->
	<form id="agendando" class ="formulario-agendamento" action="" method="POST">

		<p><a href="./telaDoDoutor.php"><button type="button">
              <
        </button></a></p>

		<!-- Este rótulo e entrada solicitam o nome do paciente -->
		<label for="nome">Nome:</label>
		<input value="<?php echo $_SESSION['nome_paciente']; ?>" id="nome" type="text" name="nome" disabled="" required><br>

		<!-- Esta etiqueta e entrada solicitam o CPF do paciente -->
		<label for="nome">CPF:</label>
		<input value="<?php echo $_SESSION['cpf_paciente']; ?>" id="cpf" type="text" name="CPF" maxlength="14" disabled="" required><br>

		<!-- Este rótulo e entrada solicitam o e-mail do paciente -->
		<label for="email">E-mail:</label>
		<input value="<?php echo $_SESSION['email_paciente']; ?>" id="email" type="email" name="email" disabled="" required><br>
		
		<!-- Este rótulo e entrada solicitam o telefone do paciente -->
		<label for="telefone">Telefone:</label>
		<input value="<?php echo $_SESSION['telefone_paciente']; ?>" id="telefone" type="tel" name="telefone" disabled="" maxlength="14" onkeyup="mascara_telefone()" required><br>

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
