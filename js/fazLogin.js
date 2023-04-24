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
    loginBox.style.height = "500px"
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
  const telefone = document.getElementById('telefone').value;
  const email = document.getElementById('email').value;
  const senha = document.getElementById('senha').value;
  const confirmaSenha = document.getElementById('confirmarSenha').value;
  // Verifica se todas as informações foram preenchidas
  if (nome === "" || telefone === "" || email === "" || senha === "" || confirmarSenha === "") {
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

  // Verifica se o e-mail já está cadastrado
  if (localStorage.getItem(email) !== null) {
    
    console.log('E-mail já cadastrado');
    // alerta para "e-mail que já está cadastrado"
    swal({
      title: "O e-mail digitado já está cadastrado",
      icon: "info",
      button: "OK !",
      timer: 1700
    });
    return;
  }


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
    telefone: telefone,
    email: email,
    senha: senha
  };

  localStorage.setItem(email, JSON.stringify(usuario));

  console.log('Usuário cadastrado com sucesso');
      // alerta para "Usuário cadastrado com sucesso"
      swal({
        title: "Usuário cadastrado com sucesso",
        icon: "success",
        timer: 1700
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
  const email = document.getElementById('email1').value;
  const senha = document.getElementById('senha1').value;

  const valor = localStorage.getItem(email);

  // Verifica se todas as informações foram preenchidas
  if (email === "" || senha === "") {
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
      swal({
        title: "Login bem sucedido",
        icon: "success",
        timer: 1700
      });
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
      document.getElementById("senha1").value = "";
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
    document.getElementById("email1").value = "";
    document.getElementById("senha1").value = "";
  }

}

