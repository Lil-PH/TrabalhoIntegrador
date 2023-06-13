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
		<select id="dataSelecionada" name="dataSelecionada" required>
			<option value="">Selecione a data</option>

		</select><br>

		<!-- Este rótulo e entrada solicitam a hora do compromisso -->
        <label for="horario">Horário:</label>
		<select id="horario" name="horario" required>
			<option value="">Selecione o horário</option>
		</select><br>
		
		<!-- Este botão envia o formulário -->
		<button type="submit" class="button" >Agendar</button>
		
	</form>
	<script src="./js/get_agendamento.js"></script>
	<!-- <script>
	$(document).ready(function() {
    // Carregar opções do primeiro select ao carregar a página
    carregarEspecialidades();
  
    // Adicionar um evento de change ao select de especialidade
    $('#select_especialidade').change(function() {
      carregarMedicos();
    });
  
    function carregarEspecialidades() {
      // Realizar uma requisição para obter a lista de especialidades do servidor
      $.ajax({
        url: 'php/get_especialidades.php', // Arquivo PHP que retorna a lista de especialidades
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          // Preencher as opções do primeiro select com as especialidades retornadas
          var options = '<option value="">Selecione a Especialidade</option>';
          for (var i = 0; i < data.length; i++) {
            options += '<option value="' + data[i].id_especialidade + '">' + data[i].descricao_especialidade + '</option>';
          }
          $('#select_especialidade').html(options);
        },
        error: function() {
          console.log('Erro ao obter as especialidades.');
        }
      });
    }
  
    function carregarMedicos() {
      var especialidadeSelecionada = $('#select_especialidade').val();
  
      // Verificar se uma especialidade foi selecionada
      if (especialidadeSelecionada !== '') {
        // Realizar uma requisição para obter a lista de médicos do servidor com base na especialidade selecionada
        $.ajax({
          url: 'php/get_medicos.php', // Arquivo PHP que retorna a lista de médicos com base na especialidade selecionada
          type: 'GET',
          dataType: 'json',
          data: { especialidade: especialidadeSelecionada },
          success: function(data) {
            // Limpar as opções existentes do segundo select
            $('#select_medico').empty();
            
            // Preencher as opções do segundo select com os médicos retornados
            var options = '<option value="">Selecione o Médico</option>';
            for (var i = 0; i < data.length; i++) {
              options += '<option value="' + data[i].id_medico + '">' + data[i].nome_medico + '</option>';
            }
            $('#select_medico').html(options);
          },
          error: function() {
            console.log('Erro ao obter os médicos.');
          }
        });
      } else {
        // Limpar as opções do segundo select se nenhuma especialidade estiver selecionada
        $('#select_medico').empty();
        $('#select_medico').html('<option value="">Selecione o Médico</option>');
      }
    }
  });
  </script> -->
</body>
</html>
