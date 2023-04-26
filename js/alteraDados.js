// function atualizarCadastro() {
//   // Obtém as informações do formulário
//   var nome = document.getElementById("nome").value;
//   var telefone = document.getElementById("telefone").value;
//   var email = document.getElementById("email").value;St
//   var senha = document.getElementById("senha").value;

//   // Verifica se o email e a senha foram preenchidos
//   // if (email === "" || senha === "") {
//   //   alert("Por favor, preencha o email e a senha.");
//   //   return;
//   // }

//   // Atualiza as informações armazenadas no localStorage
//   localStorage.setItem("nome", nome);
//   localStorage.setItem("telefone", telefone);
//   localStorage.setItem("email", email);
//   localStorage.setItem("senha", senha);

//   // Exibe uma mensagem de sucesso
//   alert("Cadastro atualizado com sucesso!");
// }

  // Obtém as informações do formulário




     


		
	// Obtém o valor do campo de email do usuário a partir do elemento com o id 'email'
    const userEmail = document.getElementById('email').value;
	// Obtém um objeto de usuário correspondente do localStorage ou cria um objeto vazio caso não exista
    const usuario = JSON.parse(localStorage.getItem(userEmail)) || {};

		// const usuario = JSON.parse(localStorage.getItem('email')) || {};
    

		// Preenche os campos de entrada do formulário com os dados do objeto de usuário
		document.getElementById('nome').value = usuario.nome || '';
		document.getElementById('cpf').value = usuario.cpf || '';
		document.getElementById('email').value = usuario.email || '';
		document.getElementById('senha').value = usuario.senha || '';
		document.getElementById('confirmarSenha').value = usuario.senha || '';
		document.getElementById('telefone').value = usuario.telefone || '';

		// Adiciona um evento de envio para o formulário
		document.querySelector('form').addEventListener('submit', (event) => {
			event.preventDefault(); // Previne o envio do formulário

			// Verifica se as senhas correspondem
			if (document.getElementById('senha').value !== document.getElementById('confirmarSenha').value) {
				// Exibe uma mensagem de erro se as senhas não correspondem
				return;
			}

			// Cria um objeto de usuário com os valores dos campos do formulário
      		const usuario = {
				nome: document.getElementById('nome').value,
				nome: document.getElementById('cpf').value,
				email: document.getElementById('email').value,
				senha: document.getElementById('senha').value,
				telefone: document.getElementById('telefone').value
			};

		// Salva o objeto de usuário atualizado no localStorage, sobrescrevendo o objeto anterior, se existir
      localStorage.setItem(usuario.email, JSON.stringify(usuario));

      // localStorage.setItem(usuario.email, JSON.stringify(usuario));
			// localStorage.setItem('email', usuario.email);

		// Exibe uma mensagem de sucesso no console
      console.log('Dados salvos com sucesso!');
			// showMessage('Dados salvos com sucesso!', 'success');
	});

		// // Função para exibir mensagens de erro ou sucesso
		// function showMessage(message, type) {
		// 	const messageBox = document.createElement('div');
		// 	messageBox.classnome = type;
		// 	messageBox.innerText = message;
		// 	document.querySelector('form').appendChild(messageBox);

		// 	// Remove a mensagem após 3 segundos
		// 	setTimeout(() => {
		// 		messageBox.remove();
		// 	}, 3000);
		// }