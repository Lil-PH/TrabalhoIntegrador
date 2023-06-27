// Seleciona o elemento HTML com o ID 'login' e o armazena na variável 'formSignin'
var formSignin = document.querySelector('#login');
// Seleciona o elemento HTML com o ID 'cadastro' e o armazena na variável 'formSignup'
var formSignup = document.querySelector('#cadastro');
// Seleciona o elemento HTML com a classe 'btnColor' e o armazena na variável 'btnColor'
var btnColor = document.querySelector('.btnColor');
// Seleciona o elemento HTML com a classe 'login-box' e o armazena na variável 'loginBox'
var loginBox = document.querySelector('.login-box');

// Adiciona um evento de clique ao botão com o ID 'btnLogin'
document.querySelector('#btnLogin')
  .addEventListener('click', () => {
    formSignin.style.left = "25px"
    formSignup.style.left = "450px"
    btnColor.style.left = "0px"
    loginBox.style.height = "350px"
});

// Adiciona um evento de clique ao botão com o ID 'btnCadastro'
document.querySelector('#btnCadastro')
  .addEventListener('click', () => {
    formSignin.style.left = "-450px"
    formSignup.style.left = "25px"
    btnColor.style.left = "100px"
    loginBox.style.height = "570px"
});


function validarCPF(cpf) {
  // Remove caracteres não numéricos do CPF
  cpf = cpf.replace(/[^\d]+/g,'');

  // Verifica se o CPF tem 11 dígitos
  if (cpf.length !== 11) {
    return false;
  }

  // Verifica se todos os dígitos são iguais (ex: 111.111.111-11)
  if (/^(\d)\1+$/.test(cpf)) {
    return false;
  }

  // Verifica se os dígitos verificadores são válidos
  var soma = 0;
  var resto;
  for (var i = 1; i <= 9; i++) {
    soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
  }
  resto = (soma * 10) % 11;
  if ((resto === 10) || (resto === 11)) {
    resto = 0;
  }
  if (resto !== parseInt(cpf.substring(9, 10))) {
    return false;
  }
  soma = 0;
  for (var i = 1; i <= 10; i++) {
    soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
  }
  resto = (soma * 10) % 11;
  if ((resto === 10) || (resto === 11)) {
    resto = 0;
  }
  if (resto !== parseInt(cpf.substring(10, 11))) {
    return false;
  }

  // Se chegou até aqui, o CPF é válido
  return true;
}

