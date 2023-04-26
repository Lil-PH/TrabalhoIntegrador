// // Pega as informacoes dos itens abaixo

// var conta = document.querySelector('#conta');
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

// Obtém os elementos do formulário pelo id
const form = document.getElementById('agendando');
const nomeInput = document.getElementById('nome');
const cpfInput = document.getElementById('cpf');
const emailInput = document.getElementById('email');
const telefoneInput = document.getElementById('telefone');
const doutorInput = document.getElementById('doutor');
const procedimentoInput = document.getElementById('procedimento');
const dataInput = document.getElementById('data');
const horaInput = document.getElementById('hora');

// Adiciona um evento de envio ao formulário
form.addEventListener('submit', function(event) {
    event.preventDefault(); // impede o envio padrão do formulário

    // Obtém os valores selecionados pelo usuário dos elementos do formulário
    const nome = nomeInput.value;
    const cpf = cpfInput.value;
    const email = emailInput.value;
    const telefone = telefoneInput.value;
    const doutor = doutorInput.value;
    const procedimento = procedimentoInput.value;
    const data = dataInput.value;
    const hora = horaInput.value;

    // Cria um objeto com os valores do agendamento
    const agendamento = {

        nome,
        cpf,
        email,
        telefone,
        doutor,
        procedimento,
        data,
        hora
    };

    // Salva o agendamento no localStorage como uma string JSON
    localStorage.setItem('agendamento', JSON.stringify(agendamento));

    // Exibe uma mensagem de sucesso ao usuário
    alert('Agendamento salvo com sucesso!');


});

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