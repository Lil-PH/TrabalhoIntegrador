$(document).ready(function() {
  // Carregar opções do primeiro select ao carregar a página
  carregarEspecialidades();

  // Adicionar um evento de change ao select de especialidade
  $('#select_especialidade').change(function() {
    carregarMedicos();
  });

    // Adicionar um evento de change ao select de médico
  $('#select_medico').change(function() {
    carregarDatas();
  });

  // Adicionar um evento de change ao select de data
  $('#select_data').change(function() {
    carregarHorarios();
  });
  
  function carregarEspecialidades() {
    // Realizar uma requisição para obter a lista de especialidades do servidor
    $.ajax({
      url: 'php/get_especialidades.php', // Arquivo PHP que retorna a lista de especialidades
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Preencher as opções do primeiro select com as especialidades retornadas
        var options = '<option value="">Selecione o Procedimento</option>';
        for (var i = 0; i < data.length; i++) {
          options += '<option value="' + data[i].id_especialidade + '">' + data[i].descricao_especialidade + '</option>';
        }
        $('#select_especialidade').html(options);
      },
      error: function() {
        console.log('Erro ao obter os Procedimentos.');
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
            // console.log(medicoSelecionado);
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

function carregarDatas() {
  var medicoSelecionado = $('#select_medico').val();

  // Verificar se um médico foi selecionado
  if (medicoSelecionado !== '') {
    // Realizar uma requisição para obter as datas disponíveis do servidor com base no médico selecionado
    $.ajax({
      url: 'php/get_datas.php', // Arquivo PHP que retorna as datas disponíveis com base no médico selecionado
      type: 'GET',
      dataType: 'json',
      data: { medico: medicoSelecionado },
      success: function(data) {
        // Limpar as opções existentes do select de datas
        $('#select_data').empty();
        
        // Preencher as opções do select de datas com as datas disponíveis retornadas
        var options = '<option value="">Selecione a Data</option>';
        for (var i = 0; i < data.length; i++) {
          options += '<option value="' + data[i].id_diaData + '">' + data[i].diaAgenda + '</option>';
        }
        $('#select_data').html(options);
      },
      error: function() {
        console.log('Erro ao obter as datas disponíveis.');
      }
    });
  } else {
    // Limpar as opções do select de datas se nenhum médico estiver selecionado
    $('#select_data').empty();
    $('#select_data').html('<option value="">Selecione a Data</option>');
  }
}
function carregarHorarios() {
  var dataSelecionada = $('#select_data').val();
  var medicoSelecionado = $('#select_medico').val();

  // Verificar se uma data e um médico foram selecionados
  if (dataSelecionada !== '' && medicoSelecionado !== '') {
    // Realizar uma requisição para obter os horários disponíveis para a data e médico selecionados
    $.ajax({
      url: 'php/get_horarios.php', // Arquivo PHP que retorna os horários disponíveis para a data e médico selecionados
      type: 'GET',
      dataType: 'json',
      data: { data: dataSelecionada, medico: medicoSelecionado },
      success: function(data) {
        // Limpar as opções existentes do quarto select
        $('#select_horario').empty();

        // Preencher as opções do quarto select com os horários retornados
        var options = '<option value="">Selecione o Horário</option>';
        for (var i = 0; i < data.length; i++) {
          options += '<option value="' + data[i].id_horaDia + '">' + data[i].horario + '</option>';
        }
        $('#select_horario').html(options);
      },
      error: function() {
        console.log('Erro ao obter os horários.');
      }
    });
  } else {
    // Limpar as opções do quarto select se nenhuma data ou nenhum médico estiverem selecionados
    $('#select_horario').empty();
    $('#select_horario').html('<option value="">Selecione o Horário</option>');
  }
}
});

$(document).ready(function() {
// Capturar o evento de envio do formulário
$('#agendando').submit(function(event) {
  event.preventDefault(); // Impedir o envio tradicional do formulário

  // Obter os valores dos campos do formulário
  var procedimento = $('#select_especialidade').val();
  var medico = $('#select_medico').val();
  var data = $('#select_data').val();
  var horario = $('#select_horario').val();

  // Criar um objeto com os dados do agendamento
  var agendamentoData = {
    procedimento: procedimento,
    medico: medico,
    data: data,
    horario: horario
  };

  // Enviar os dados do agendamento para o arquivo PHP
  $.post('./php/fazerAgendamento.php', agendamentoData, function(response) {
    // Verificar a resposta do servidor
    if (response.success) {
      // Agendamento realizado com sucesso
      // alert(response.message);
      console.log("FEITO");
        swal({
            title: "Agendamento foi realizado com sucesso",
            icon: "success",
            button: "OK !"
          }).then(function() {
            // Redireciona o cliente para a página de inicio após o usuário clicar no botão OK na caixa de diálogo
            window.location.href = "./telaDoDoutor.php"
          }).catch(function(error) {
            console.log(error);
          });
      // Redirecionar para a página de sucesso ou fazer qualquer outra ação necessária
    } else {
      // Erro ao realizar o agendamento
      alert(response.message);
      console.log("ERROOOOOOOOOO");
      // Fazer qualquer ação necessária para lidar com o erro
    }
  }, 'json');
});
});


                  //  console.log('Agendamento foi realizado com sucesso');
                  //     // Exibe uma mensagem de sucesso para o usuário usando a biblioteca 'sweetalert'
                  //     swal({
                  //         title: "Agendamento foi realizado com sucesso",
                  //         icon: "success",
                  //         button: "OK !"
                  //     }).then(function() {
                  //         // Redireciona o cliente para a página de inicio após o usuário clicar no botão OK na caixa de diálogo
                  //         window.location.href = "../index.php"
                  //       }).catch(function(error) {
                  //         console.log(error);
                  //       });
  
// }