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

const formAgenda = document.getElementById('agendando');

formAgenda.addEventListener('submit', function(evento) {
    // Previne o comportamento padrão do formulário, que é enviar os 
    // dados para um servidor e recarregar a página
    evento.preventDefault();
    // Chama a função 'cadastrarUsuario'
    agendar();
});

function agendar() {

    // Obtém os elementos do formulário pelo id
    const nome = document.getElementById('nome').value;
    const cpf = document.getElementById('cpf').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('telefone').value;
    const doutor = document.getElementById('doutor').value;
    const procedimento = document.getElementById('procedimento').value;
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;
    const status = 'Pendente';

        const agendamento = {
            nome: nome,
            email: email,
            cpf: cpf,
            telefone: telefone,
            doutor: doutor,
            procedimento: procedimento,
            data: data,
            hora: hora,
            status: status
            // id: id
          };
        
            const agendamentos = JSON.parse(localStorage.getItem('agendamentos')) || [];

            let id;
            do {
                id = Math.floor(Math.random() * 1000000);
            } while (agendamentos.find(agendamento => agendamento.id === id));
            agendamento.id = id;

            agendamentos.push(agendamento);

            localStorage.setItem('agendamentos', JSON.stringify(agendamentos));

                alert('Agendamento realizado com sucesso!');
                formAgenda.reset();


                     console.log('Agendamento foi realizado com sucesso');
                        // Exibe uma mensagem de sucesso para o usuário usando a biblioteca 'sweetalert'
                        swal({
                            title: "Agendamento foi realizado com sucesso",
                            icon: "success",
                            button: "OK !"
                        }).then(function() {
                            // Redireciona o cliente para a página de inicio após o usuário clicar no botão OK na caixa de diálogo
                            window.location.href = "../index.html"
                          }).catch(function(error) {
                            console.log(error);
                          });
    
}
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