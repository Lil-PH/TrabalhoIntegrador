// Mensagem para parte de LOGIN
document.addEventListener('DOMContentLoaded', function() {
  // Obtenha o formulário pelo ID ou qualquer outro seletor adequado
  var formLogin = document.querySelector('#login');
  // Adicione um evento de envio ao formulário
  formLogin.addEventListener('submit', function(event) {
      // Interrompa o envio padrão do formulário
      event.preventDefault();

      // Realize a validação dos dados, por exemplo, verifique se os campos estão preenchidos corretamente

      // Crie um objeto FormData para enviar os dados do formulário
      var formData = new FormData(formLogin);

      // Faça a chamada AJAX usando o método fetch()
      fetch('./php/validarUsuario.php', { // Substitua pelo caminho correto para o seu arquivo PHP
          method: 'POST',
          body: formData
      })
      .then(function(response) {
          return response.json(); // Converte a resposta para JSON
      })
      .then(function(data) {
          // Verifique se a resposta foi bem-sucedida
          if (data.success) {
              // Use o SweetAlert para exibir uma mensagem de sucesso
              Swal.fire({
                  icon: 'success',
                  title: 'Sucesso!',
                  text: data.message
              }).then(function() {
                  // Redirecione o usuário para outra página após o fechamento da mensagem
                  window.location.href = 'telaDoUser.php';
              });
          } else {
              // Use o SweetAlert para exibir uma mensagem de erro
              Swal.fire({
                  icon: 'error',
                  title: 'Erro!',
                  text: data.message
              });
          }
      })
      .catch(function(error) {
          // Em caso de erro na chamada Ajax
          console.log(error);
          // Use o SweetAlert para exibir uma mensagem de erro genérica
          Swal.fire({
              icon: 'error',
              title: 'Erro!',
              text: 'Ocorreu um erro durante o processamento. Por favor, tente novamente mais tarde.'
          });
      });
  });
});


// Mensagem para parte de CADASTRO
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('#cadastro');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
  
      var formData = new FormData(form);
  
      fetch('./php/createPaciente.php', {
        method: 'POST',
        body: formData
      })
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        if (data.success) {
          Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: data.message
          }).then(function() {
            window.location.href = 'loginCadastro.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: data.message
          });
        }
      })
      .catch(function(error) {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Erro!',
          text: 'Ocorreu um erro durante o processamento. Por favor, tente novamente mais tarde.'
        });
      });
    });
});