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


$(document).ready(function() {
    // Captura o evento de envio do formulário "validaUser"
    $('#validaUser').submit(function(event) {
      event.preventDefault();

      var email = $('#validaUserEmail').val();
      var cpf = $('#validaUsercpf').val();

      var data = {
        validaUserEmail: email,
        validaUsercpf: cpf
      };

      $.ajax({
        type: 'POST',
        url: './php/validar_usuario.php',
        data: data,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            // Senha e usuário validados com sucesso, agora exibimos o formulário "trocarSenha"
            $('#validaUser').hide();
            $('#trocarSenha').show();
          } else {
            alert(response.message);
          }
        },
        error: function(xhr, status, error) {
          alert('Erro ao processar a solicitação: ' + error);
        }
      });
    });

    // Captura o evento de envio do formulário "trocarSenha"
    $('#trocarSenha').submit(function(event) {
      event.preventDefault();

      var novaSenha = $('#novaSenha').val();
      var confirmarNovaSenha = $('#confirmarNovaSenha').val();

      // Aqui você pode realizar a validação dos campos do formulário "trocarSenha" antes de enviá-lo para o PHP

      var data = {
        novaSenha: novaSenha,
        confirmarNovaSenha: confirmarNovaSenha
      };

      $.ajax({
        type: 'POST',
        url: './php/atualizar_senha.php',
        data: data,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            alert(response.message);
          } else {
            alert(response.message);
          }
        },
        error: function(xhr, status, error) {
          alert('Erro ao processar a solicitação: ' + error);
        }
      });
    });
});




