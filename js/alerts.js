function alertAgendameto() {

    swal({
        title: "Agendamento foi realizado com sucesso",
        icon: "success",
        button: "OK !"
    }).then(function() {
        // Redireciona o cliente para a página de inicio após o usuário clicar no botão OK na caixa de diálogo
        window.location.href = "../index.php"
    }).catch(function(error) {
        console.log(error);
    });
}

// function alertFalhaLogar() {



// }

function alertCampos() {

    swal({
        title: "Por favor, preencha todos os campos",
        icon: "error",
        button: "OK !",
        timer: 1700,
    });
    
}

function alertEmailCpf() {

    swal({
        title: "O CPF ou Email digitado já está cadastrado",
        icon: "info",
        button: "OK !"
      });
      return;
    
}

// function alertAgendameto() {

    

// }

// function alertAgendameto() {


    
// }




import mascara_telefone from './mascaras.js'

mascara_telefone();













if (nome === "" || cpf === "" || telefone === "" || email === "" || senha === "" || confirmarSenha === "") {
    console.log('Por favor, preencha todos os campos');

    swal({
      title: "Por favor, preencha todos os campos",
      icon: "error",
      button: "OK !",
      timer: 1700,
    });
    // alert('Por favor, preencha todos os campos');
    return;
  }

  // Verifica se o cpf já está cadastrado
  if (localStorage.getItem(cpf) !== null || localStorage.getItem(email) !== null) {
    console.log('CPF ou Email já está cadastrado');
    // alerta para "CPF que já está cadastrado"
    swal({
      title: "O CPF ou Email digitado já está cadastrado",
      icon: "info",
      button: "OK !"
    });
    return;
  }

  // if (localStorage.getItem(email) !== null) {
  //   console.log('O e-mail já está cadastrado');
  //   // alerta para "email que já está cadastrado"
  //   swal({
  //     title: "O email digitado já está cadastrado",
  //     icon: "info",
  //     button: "OK !"
  //   });
  //   return;
  // }


  // Verifica se as senhas correspondem
  if (senha !== confirmarSenha) {

    // alerta para "As senhas não corresdidas"
    console.log('As senhas não corresdidas');
    swal({
      title: "As senhas digitadas, não correspondem",
      icon: "error",
      button: "OK !",
      timer: 1700
    });

    
      // Limpa o as senhas
      document.getElementById("senha").value = "";
      document.getElementById("confirmarSenha").value = "";
      document.getElementById("senha").focus();
    return;
  }

  localStorage.setItem(cpf, JSON.stringify(usuario));

  console.log('Usuário cadastrado com sucesso');
    // alerta para "Usuário cadastrado com sucesso"
    swal({
      title: "Usuário cadastrado com sucesso",
      icon: "success",
      button: "OK !"
    });
  // Redireciona o usuário para a página de login
  window.location.href = "../html/loginCadastro.html";


if (valor !== null) {
  const usuario = JSON.parse(valor);
  if (usuario.senha === senha) {
    console.log('Login bem-sucedido');
    // Redireciona o usuário para a página do doutor
    window.location.href = "../html/telaDoDoutor.html"

  } else {
    console.log('Senha incorreta');
    // alerta para "Senha incorreta"
    swal({
      title: "Senha incorreta",
      icon: "error",
      button: "OK !",
      timer: 1700
    });
    document.getElementById("senhaLogin").value = "";
  }
  
} else {
  console.log('Usuário não encontrado');
  // alerta para "Usuário não encontrado"
  swal({
    title: "Usuário não encontrado",
    icon: "info",
    button: "OK !",
    timer: 1700
  });
  document.getElementById("cpfLogin").value = "";
  document.getElementById("senhaLogin").value = "";
}

