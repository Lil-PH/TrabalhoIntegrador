// document.addEventListener('DOMContentLoaded', () => {
//     let selectProcedimento = document.getElementById('procedimento');

//     selectProcedimento.onchange = () => {
//         let selectMedico = document.getElementById('medico');
//         let valor = selectProcedimento.value;
    
//         fetch("./php/medicoSelect.php?procedimento=" + valor)
//             .then(response => {
//                 console.log(selectProcedimento);
//                 console.log(response)
//                 return response.text();
//             })
//             .then(texto => {
//                 console.log(texto);
//                 selectMedico.innerHTML = texto;
//             });
//     }
//   });




$(document).ready(function() {
    // Evento de alteração do primeiro select (procedimento)
    $('#select_procedimento').change(function() {
      var procedimentoSelecionado = $(this).val();

      // Fazer uma requisição Ajax para obter os médicos com base no procedimento selecionado
      $.ajax({
        url: './php/medicoSelect.php',
        type: 'GET',
        data: {procedimentoSelecionado: procedimentoSelecionado},
        dataType: 'json',
        success: function(response) {
          // Limpar o segundo select (médico)
          $('#select_medico').empty();

          // Preencher o segundo select com os médicos retornados
          $.each(response, function(key, value) {
            $('#select_medico').append('<option value="' + key + '">' + value + '</option>');
          });
        }
      });
    });
  });