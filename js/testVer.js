var tabela = document.querySelector('#linha-consulta');

function preencherTabela(consultas) {
  // Limpa o conteúdo atual da tabela
  tabela.innerHTML = '';

  // Verifica se há resultados
  if (consultas.length > 0) {
    // Itera sobre os resultados e cria as linhas da tabela
    consultas.forEach(function(consulta) {
      var row = '<tr>' +
                  '<td class="column1">' + consulta.nome_paciente + '</td>' +
                  '<td class="column2">' + consulta.nome_medico + '</td>' +
                  '<td class="column3">' + consulta.descricao_especialidade + '</td>' +
                  '<td class="column4">' + consulta.diaAgenda + '</td>' +
                  '<td class="column5">' + consulta.horario + '</td>' +
                  '<td class="column6" data-id-consulta="' + consulta.id_consulta + '">' + consulta.consulta_status + '</td>' +
                '</tr>';

      tabela.innerHTML += row;

    });
    // Chamar a função para adicionar o evento de clique nas linhas da tabela
    adicionarEventoCliqueLinhas();
  } else {
    // Caso não haja resultados, exibe uma mensagem na tabela
    var row = '<tr><td colspan="6">Nenhum agendamento encontrado.</td></tr>';
    tabela.innerHTML = row;
  }
}

function adicionarEventoCliqueLinhas() {
  var linhas = document.querySelectorAll('#linha-consulta tr');
  linhas.forEach(function(linha) {
    linha.addEventListener('click', function() {
      // Obter o id da consulta e o status atual da linha clicada
      var idConsulta = linha.querySelector('.column6').getAttribute('data-id-consulta');
      var statusAtual = linha.querySelector('.column6').innerText;
      var tipoUsuario = document.getElementById('tipo-usuario').getAttribute('data-tipo-usuario');
      // Verificar se o médico tem permissão para alterar o status
      if (tipoUsuario === 'medico') {

        Swal.fire({
          title: 'Selecione o novo status da consulta:',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Confirmar',
          confirmButtonColor: '#3085d6',
          cancelButtonText: 'Cancelar',
          showDenyButton: true,
          denyButtonText: 'Não Confirmada'
        }).then((result) => {

          if (result.isConfirmed) {
            var novoStatus = 'Confirmada';
            if (novoStatus !== null && novoStatus !== statusAtual) {
              atualizarStatusConsulta(idConsulta, novoStatus);
              linha.querySelector('.column6').innerText = novoStatus;
            }
            Swal.fire(
              'Sucesso!',
              'O status da consulta foi definido para "Confirmada"',
              'success'
            )
          } else if (result.isDenied) {
            var novoStatus = 'Não Confirmada';
            if (novoStatus !== null && novoStatus !== statusAtual) {
              atualizarStatusConsulta(idConsulta, novoStatus);
              linha.querySelector('.column6').innerText = novoStatus;
            }
            Swal.fire(
              'Sucesso!',
              'O status da consulta foi definido para "Não Confirmada"',
              'success'
            )
          } else {
            Swal.fire(
              'Falha!',
              'Status da consulta não alterada',
              'error'
            )
          }
          
        });

        // Verificar se o médico selecionou um novo status
        if (novoStatus !== null && novoStatus !== statusAtual) {
          // Chamar a função para atualizar o status da consulta
          atualizarStatusConsulta(idConsulta, novoStatus);
          // Atualizar o status atual na linha da tabela
          linha.querySelector('.column6').innerText = novoStatus;
        }
      } else {
        // Ignorar o clique quando o médico não tem permissão
        return;
      }
    });
  });
}

function atualizarTabela() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', './php/consulta.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      preencherTabela(data);
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      console.log('Erro na requisição AJAX');
    }
  };
  xhr.send();
}

// Atualiza a tabela imediatamente e a cada 5 segundos
atualizarTabela();
setInterval(atualizarTabela, 5000);


function atualizarStatusConsulta(idConsulta, novoStatus) {
  // Enviar solicitação para atualizar o status da consulta
  fetch('./php/atualizar_status_consulta.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'idConsulta=' + encodeURIComponent(idConsulta) + '&novoStatus=' + encodeURIComponent(novoStatus)
  })
  .then(response => {
    if (response.ok) {
      console.log('Status da consulta atualizado com sucesso');
    } else {
      console.log('Erro ao atualizar o status da consulta');
    }
  })
  .catch(error => {
    console.error('Erro ao enviar a solicitação:', error);
  });
}