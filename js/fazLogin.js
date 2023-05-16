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





// Obtém a referência do elemento HTML com o ID "cadastro" 
// e armazena na variável 'formulario'
const formulario = document.getElementById('cadastro');

// Adiciona um evento de envio de formulário ao elemento 'formulario'
formulario.addEventListener('submit', function(evento) {
  // Previne o comportamento padrão do formulário, que é enviar os 
  // dados para um servidor e recarregar a página
  evento.preventDefault();
  // Chama a função 'cadastrarUsuario'
  cadastrarUsuario();
});

// Define a função 'cadastrarUsuario'
function cadastrarUsuario() {
  // Obtém os valores inseridos nos campos do formulário HTML
  // e armazena nas respectivas variáveis
  const nome = document.getElementById('nome').value;
  const cpf = document.getElementById('cpf').value;
  const telefone = document.getElementById('telefone').value;
  const email = document.getElementById('email').value;
  const senha = document.getElementById('senha').value;
  const confirmarSenha = document.getElementById('confirmarSenha').value;

  // Valida o CPF
  if (!validarCPF(cpf)) {
    console.log('CPF inválido');
    // Exibe uma mensagem de erro para o usuário usando a biblioteca 'sweetalert'
    swal({
      title: "CPF inválido",
      icon: "error",
      button: "OK !",
      timer: 1700,
    });
    // Para a execução da função caso o CPF seja inválido
    return;
  }


  // Verifica se todas as informações foram preenchidas
  if (nome === "" || cpf === "" || telefone === "" || email === "" || senha === "" || confirmarSenha === "") {
    console.log('Por favor, preencha todos os campos');

    // Exibe uma mensagem de erro para o usuário usando a biblioteca 'sweetalert'
    swal({
      title: "Por favor, preencha todos os campos",
      icon: "error",
      button: "OK !",
      timer: 1700,
    });
    // Para a execução da função caso algum campo esteja vazio
    return;
  }

  // Verifica se o CPF ou o e-mail já estão cadastrados no banco de dados local
  if (localStorage.getItem(cpf) !== null || localStorage.getItem(email) !== null) {
    console.log('CPF ou Email já está cadastrado');
    // Exibe uma mensagem informativa para o usuário usando a biblioteca 'sweetalert'
    swal({
      title: "O CPF ou Email digitado já está cadastrado",
      icon: "info",
      button: "OK !"
    });
    // Para a execução da função caso o CPF ou o e-mail já estejam cadastrados
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


  // Verifica se a senha digitada é igual à senha de confirmação
  if (senha !== confirmarSenha) {

    // Exibe uma mensagem de erro para o usuário usando a biblioteca 'sweetalert'
    console.log('As senhas não corresdidas');
    swal({
      title: "As senhas digitadas, não correspondem",
      icon: "error",
      button: "OK !",
      timer: 1700
    });

      // Limpa os campos de senha e confirmação
      document.getElementById("senha").value = "";
      document.getElementById("confirmarSenha").value = "";
      // Coloca o foco no campo de senha
      document.getElementById("senha").focus();
    // Para a execução da função caso as senhas não correspondam
    return;
  }

  // Se a senha estiver correta, prossegue com o cadastro do usuário
  const usuario = {
    nome: nome,
    cpf: cpf,
    telefone: telefone,
    email: email,
    senha: senha
  };

  // Armazena os dados do usuário no armazenamento local, 
  // usando o CPF como chave e os dados do usuário como valor
  localStorage.setItem(cpf, JSON.stringify(usuario));

    console.log('Usuário cadastrado com sucesso');
      // Exibe uma mensagem de sucesso para o usuário usando a biblioteca 'sweetalert'
      swal({
        title: "Usuário cadastrado com sucesso",
        icon: "success",
        button: "OK !"
      }).then(function() {
        // Redireciona o usuário para a página de login após o usuário clicar no botão OK na caixa de diálogo
        window.location.href = "../php/loginCadastro.php";
      }).catch(function(error) {
        console.log(error);
      });
    // Redireciona o usuário para a página de login
}

// Seleciona o elemento do formulário de login

const formularioLogin = document.getElementById('login');

// Adiciona um evento de escuta para o envio do formulário
formularioLogin.addEventListener('submit', function(evento) {
  evento.preventDefault();
  fazerLogin();
});

// Define a função para realizar o login
function fazerLogin() {
  // Obtém as informações do formulário
  const cpf = document.getElementById('cpfLogin').value;
  const senha = document.getElementById('senhaLogin').value;

  // Obtém o valor armazenado no localStorage para o CPF digitado
  const valor = localStorage.getItem(cpf);

  // Verifica se todas as informações foram preenchidas
  if (cpf === "" || senha === "") {
    console.log('Por favor, preencha todos os campos');
    // Alerta o usuário para preencher todos os campos
    swal({
      title: "Por favor, preencha todos os campos",
      icon: "error",
      button: "OK !",
      timer: 1700
    });
    return;
  }

  // Verifica se o valor para o CPF digitado existe no localStorage
  if (valor !== null) {
    // Converte o valor em um objeto de usuário
    const usuario = JSON.parse(valor);
    // Verifica se a senha digitada é igual à senha armazenada
    if (usuario.senha === senha) {
      console.log('Login bem-sucedido');
      // Redireciona o usuário para a página do doutor
      window.location.href = "../php/telaDoDoutor.php"

    } else {
      console.log('Senha incorreta');
      // Alerta o usuário que a senha está incorreta
      swal({
        title: "Senha incorreta",
        icon: "error",
        button: "OK !",
        timer: 1700
      });
      // Limpa o campo de senha
      document.getElementById("senhaLogin").value = "";
    }
    
  } else {
    console.log('Usuário não encontrado');
    // Alerta o usuário que o usuário não foi encontrado
    swal({
      title: "Usuário não encontrado",
      icon: "info",
      button: "OK !",
      timer: 1700
    });
    // Limpa os campos de CPF e senha
    document.getElementById("cpfLogin").value = "";
    document.getElementById("senhaLogin").value = "";
  }

}

