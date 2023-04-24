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



		
// Recupera os dados do usuário do localStorage, se existirem

    const userEmail = document.getElementById('email').value;
    const usuario = JSON.parse(localStorage.getItem(userEmail)) || {};

		// const usuario = JSON.parse(localStorage.getItem('email')) || {};
    

		// Preenche os campos de entrada com os dados do usuário
		document.getElementById('nome').value = usuario.nome || '';
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

      const usuario = {
				name: document.getElementById('nome').value,
				email: document.getElementById('email').value,
				password: document.getElementById('senha').value,
				phone: document.getElementById('telefone').value
			};

			// Salva os dados do usuário no localStorage
      localStorage.setItem(usuario.email, JSON.stringify(usuario));

      // localStorage.setItem(usuario.email, JSON.stringify(usuario));
			// localStorage.setItem('email', usuario.email);

			// Exibe uma mensagem de sucesso
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