var tabela = document.querySelector('#tbody');

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
                  '<td class="column6">' + consulta.consulta_status + '</td>' +
                '</tr>';

      tabela.innerHTML += row;
    });
  } else {
    // Caso não haja resultados, exibe uma mensagem na tabela
    var row = '<tr><td colspan="4">Nenhum agendamento encontrado.</td></tr>';
    tabela.innerHTML = row;
  }
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
