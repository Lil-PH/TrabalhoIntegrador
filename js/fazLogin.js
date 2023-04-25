// Pega as informacoes dos itens abaixo

var formSignin = document.querySelector('#login');
var formSignup = document.querySelector('#cadastro');
var btnColor = document.querySelector('.btnColor');
var loginBox = document.querySelector('.login-box');

// altera a estética da div cadastro e login

document.querySelector('#btnLogin')
  .addEventListener('click', () => {
    formSignin.style.left = "25px"
    formSignup.style.left = "450px"
    btnColor.style.left = "0px"
    loginBox.style.height = "350px"
});

document.querySelector('#btnCadastro')
  .addEventListener('click', () => {
    formSignin.style.left = "-450px"
    formSignup.style.left = "25px"
    btnColor.style.left = "100px"
    loginBox.style.height = "570px"
});


// formulário para fazer cadastro
const formulario = document.getElementById('cadastro');

formulario.addEventListener('submit', function(evento) {
  evento.preventDefault();
  cadastrarUsuario();
});

function cadastrarUsuario() {
  // Obtém as informações do formulário
  const nome = document.getElementById('nome').value;
  const cpf = document.getElementById('cpf').value;
  const telefone = document.getElementById('telefone').value;
  const email = document.getElementById('email').value;
  const senha = document.getElementById('senha').value;
  const confirmarSenha = document.getElementById('confirmarSenha').value;
  // Verifica se todas as informações foram preenchidas
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


  const usuario = {
    nome: nome,
    cpf: cpf,
    telefone: telefone,
    email: email,
    senha: senha
  };

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
}

// formulário para fazer login

const formularioLogin = document.getElementById('login');

formularioLogin.addEventListener('submit', function(evento) {
  evento.preventDefault();
  fazerLogin();
});

function fazerLogin() {
  const cpf = document.getElementById('cpfLogin').value;
  const senha = document.getElementById('senhaLogin').value;

  const valor = localStorage.getItem(cpf);

  // Verifica se todas as informações foram preenchidas
  if (cpf === "" || senha === "") {
    console.log('Por favor, preencha todos os campos');
    // alerta para "Preencha todos os campos"
    swal({
      title: "Por favor, preencha todos os campos",
      icon: "error",
      button: "OK !",
      timer: 1700
    });
    return;
  }

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

}

