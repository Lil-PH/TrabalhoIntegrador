<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agendamento Odontológico</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/agendar.css">
    <link rel="shortcut icon" href="../img/Dente.png" type="image/x-icon">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" crossorigin="anonymous"></script>
</head>
<body>

 	<!-- Este é um título para o formulário -->
    <h1>Agendamento Odontológico</h1>

	<!-- Este é o formulário para agendamento de consulta odontológica -->
	<form id="agendando" class ="formulario-agendamento">

		<!-- Este rótulo e entrada solicitam o nome do paciente -->
		<label for="nome">Nome:</label>
		<input id="nome" type="text" name="nome" required><br>

		<!-- Esta etiqueta e entrada solicitam o CPF do paciente -->
		<label for="nome">CPF:</label>
		<input id="cpf" type="text" name="CPF" maxlength="14" autocomplete="off" required><br>

		<!-- Este rótulo e entrada solicitam o e-mail do paciente -->
		<label for="email">E-mail:</label>
		<input id="email" type="email" name="email" required><br>
		
		<!-- Este rótulo e entrada solicitam o telefone do paciente -->
		<label for="telefone">Telefone:</label>
		<input id="telefone" type="tel" name="telefone" maxlength="14" onkeyup="mascara_telefone()" required><br>

		<!-- Este rótulo e selecione pergunte pelo dentista preferido do paciente -->
        <label for="doutor">Doutor:</label>
		<select id="doutor" name="doutor" required>
			<option value="">Selecione o doutor</option>
			<option value="Dr. João">Dr. João</option>
			<option value="Dra. Maria">Dra. Maria</option>
			<option value="Dr. Pedro">Dr. Pedro</option>
			<option value="Dr. José">Dr. José</option>
		</select><br>

		<!-- Este rótulo e selecione pergunte pelo tipo de agendamento -->
        <label for="procedimento">Procedimento:</label>
		<select id="procedimento" name="procedimento" required>
			<option value="">Selecione o Procedimento</option>
			<option value="Limpeza">Limpeza</option>
			<option value="Manutenção">Manutenção</option>
			<option value="Clareamento">Clareamento</option>
			<option value="Extração">Extração</option>
		</select><br>

		<!-- Este rótulo e entrada solicitam a data do compromisso -->
		<label for="data">Data:</label>
		<input id="data" type="date" name="data" required><br>

		<!-- Este rótulo e entrada solicitam a hora do compromisso -->
		<label for="hora">Hora:</label>
		<input id="hora" type="time" name="hora" required><br>
		
		<!-- Este botão envia o formulário -->
		<button type="submit" class="button" onclick="agendar()">Agendar</button>
		
	</form>

	<!-- Adicionando o arquivo de script -->
	<script src="../js/agendamento.js"></script>
	<script src="../js/mascaras.js"></script>

</body>
</html>