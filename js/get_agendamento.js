// // Pega as informacoes dos itens abaixo

// var  = document.querySelector('#select_especialidade');
// var agenda = document.querySelector('#agenda');
// var minhaAgenda = document.querySelector('.minha-agenda');
// var minhaConta = document.querySelector('.minha-conta');

// // altera a estética da div cadastro e login

// document.querySelector('#agenda')
//   .addEventListener('click', () => {
//     minhaConta.style.display = "none"
//     minhaAgenda.style.display = "flex"
// });

// document.querySelector('#conta')
//   .addEventListener('click', () => {
//     minhaAgenda.style.display = "none"
//     minhaConta.style.display = "flex"
// });

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
    $('#dataSelecionada').change(function() {
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

  //   function carregarDatas() {
  //     var procedimentoSelecionado = $('#select_especialidade').val();
  //     var medicoSelecionado = $('#select_medico').val();

  //     // Verificar se um procedimento e médico foram selecionados
  //     if (procedimentoSelecionado !== '' && medicoSelecionado !== '') {
  //       // Realizar uma requisição para obter a lista de datas disponíveis do servidor com base no procedimento e médico selecionados
  //       $.ajax({
  //         url: 'php/get_datas.php', // Arquivo PHP que retorna a lista de datas disponíveis com base no procedimento e médico selecionados
  //         type: 'GET',
  //         dataType: 'json',
  //         data: {
  //           procedimento: procedimentoSelecionado,
  //           medico: medicoSelecionado
  //         },
  //         success: function(data) {
  //           // Limpar as opções existentes do terceiro select
  //           $('#dataSelecionada').empty();

  //           // Preencher as opções do terceiro select com as datas retornadas
  //           var options = '<option value="">Selecione a Data</option>';
  //           for (var i = 0; i < data.length; i++) {
  //             options += '<option value="' + data[i].data + '">' + data[i].data + '</option>';
  //           }
  //           $('#dataSelecionada').html(options);
  //         },
  //         error: function() {
  //           console.log('Erro ao obter as datas.');
  //         }
  //       });
  //     } else {
  //       // Limpar as opções do terceiro select se algum campo estiver vazio
  //       $('#dataSelecionada').empty();
  //       $('#dataSelecionada').html('<option value="">Selecione a Data</option>');
  //     }
  //   }

  // function carregarHorarios() {
  //   var procedimentoSelecionado = $('#select_especialidade').val();
  //   var medicoSelecionado = $('#select_medico').val();
  //   var dataSelecionada = $('#dataSelecionada').val();

  //   // Verificar se um procedimento, médico e data foram selecionados
  //   if (procedimentoSelecionado !== '' && medicoSelecionado !== '' && dataSelecionada !== '') {
  //     // Realizar uma requisição para obter a lista de horários disponíveis do servidor com base no procedimento, médico e data selecionados
  //     $.ajax({
  //       url: 'php/get_horarios.php', // Arquivo PHP que retorna a lista de horários disponíveis com base no procedimento, médico e data selecionados
  //       type: 'GET',
  //       dataType: 'json',
  //       data: {
  //         procedimento: procedimentoSelecionado,
  //         medico: medicoSelecionado,
  //         data: dataSelecionada
  //       },
  //       success: function(data) {
  //         // Limpar as opções existentes do quarto select
  //         $('#horario').empty();

  //         // Preencher as opções do quarto select com os horários retornados
  //         var options = '<option value="">Selecione o Horário</option>';
  //         for (var i = 0; i < data.length; i++) {
  //           options += '<option value="' + data[i].horario + '">' + data[i].horario + '</option>';
  //         }
  //         $('#horario').html(options);
  //       },
  //       error: function() {
  //         console.log('Erro ao obter os horários.');
  //       }
  //     });
  //   } else {
  //     // Limpar as opções do quarto select se algum campo estiver vazio
  //     $('#horario').empty();
  //     $('#horario').html('<option value="">Selecione o Horário</option>');
  //   }
  // }



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
// Obtém os dados do localStorage








		// // Obtém os dados do localStorage
		// var eventos = localStorage.getItem('eventos');

		// // Converte os dados de string para objeto
		// eventos = JSON.parse(eventos);

		// // Cria uma variável para armazenar a marcação HTML da tabela de eventos
		// var tabela = '';

		// // Verifica se há eventos agendados
		// if(eventos && eventos.length > 0) {
		// 	// Loop pelos eventos e adiciona cada um à tabela
		// 	for(var i = 0; i < eventos.length; i++) {
		// 		tabela += '<tr><td>' + eventos[i].data + '</td><td>' + eventos[i].evento + '</td></tr>';
		// 	}
		// } else {
		// 	// Exibe mensagem caso não haja eventos agendados
		// 	tabela += '<tr><td colspan="2">Nenhum evento agendado.</td></tr>';
		// }

		// // Adiciona a tabela de eventos à página
		// document.getElementById('eventos').innerHTML = tabela;