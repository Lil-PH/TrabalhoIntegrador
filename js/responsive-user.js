// A função 'menuShow()' é responsável por exibir ou ocultar o menu mobile da página,
// alterando a classe do elemento com a classe 'mobile-menu' e a imagem do ícone
function menuShow() {
  let menuMobile = document.querySelector('.mobile-menu');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
      // Altera a imagem do ícone para o ícone do menu quando o menu está fechado
      document.querySelector('.icon').src = "./img/menu_white_36dp.svg";
  } else {
      menuMobile.classList.add('open');
      // Altera a imagem do ícone para o ícone de fechar quando o menu está aberto
      document.querySelector('.icon').src = "./img/close_white_36dp.svg";
  }
}

// Pega as informacoes dos itens abaixo
// O código abaixo seleciona elementos HTML através dos seus IDs e classes, e atribui a variáveis para manipulação posterior
var conta = document.querySelector('#conta');
var agenda = document.querySelector('#agenda');
var contaResponsiva = document.querySelector('#conta-responsiva');
var agendaResponsiva = document.querySelector('#agenda-responsiva');
// var inicio = document.querySelector('#inicio');
var listar = document.querySelector('#listar');
var minhaAgenda = document.querySelector('.minha-agenda');
var minhaConta = document.querySelector('.minha-conta');
var telaInicial = document.querySelector('.tela-inicial');

// Quando o elemento com id "agenda" for clicado, irá ocultar as telas iniciais e de conta, e exibir a tela da agenda
agenda.addEventListener('click', function() {
  telaInicial.style.display = "none"
  minhaConta.style.display = "none"
  minhaAgenda.style.display = "flex"
});

// Quando o elemento com id "conta" for clicado, irá ocultar as telas iniciais e da agenda, e exibir a tela da conta
conta.addEventListener('click', function() {
  telaInicial.style.display = "none"
  minhaAgenda.style.display = "none"
  minhaConta.style.display = "flex"
});

// Quando o elemento com id "inicio" for clicado, irá ocultar as telas da agenda e de conta, e exibir a tela inicial
// inicio.addEventListener('click', function() {
//   minhaAgenda.style.display = 'none';
//   minhaConta.style.display = 'none';
//   telaInicial.style.display = 'flex';
// });

// Quando o elemento com id "agenda-responsiva" for clicado, irá ocultar as telas iniciais e de conta, e exibir a tela da agenda
agendaResponsiva.addEventListener('click', function() {
  telaInicial.style.display = "none"
  minhaConta.style.display = "none"
  minhaAgenda.style.display = "flex"
});

// Quando o elemento com id "conta-responsiva" for clicado, irá ocultar as telas iniciais e da agenda, e exibir a tela da conta
contaResponsiva.addEventListener('click', function() {
    telaInicial.style.display = "none"
    minhaAgenda.style.display = "none"
    minhaConta.style.display = "flex"
});

// Classe MobileNavbar que cria um menu de navegação móvel
class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList = document.querySelector(navList);
      this.navLinks = document.querySelectorAll(navLinks);
      this.activeClass = "active";
  
      this.handleClick = this.handleClick.bind(this);
    }
    
    // Método que realiza animações nos links de navegação do menu
    animateLinks() {
      this.navLinks.forEach((link, index) => {
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${
              index / 7 + 0.3
            }s`);
      });
    }
    
    // Método handleClick que irá executar quando ocorrer um evento de clique em um dos links do menu de navegação
    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }
    
    // Método que irá adicionar eventos de clique para cada link do menu de navegação
    addClickEvent() {
      this.mobileMenu.addEventListener("click", this.handleClick);
    }
  
    // Método que inicializa a classe e adiciona o evento de clique caso o menu móvel exista
    init() {
      // Verificação para saber se o menu móvel existe, caso exista, é adicionado o evento de clique
      if (this.mobileMenu) {
        this.addClickEvent();
      }
      // Retorno do objeto da própria classe para permitir a encadeação de métodos
      return this;
    }
}


document.addEventListener('DOMContentLoaded', function() {
  var form = document.querySelector('#alterar');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Exibe um alerta de confirmação antes de atualizar os dados
    Swal.fire({
      title: 'Tem certeza?',
      text: 'Deseja realmente atualizar seus dados?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sim',
      cancelButtonText: 'Cancelar'
    }).then(function(result) {
      if (result.isConfirmed) {
        var formData = new FormData(form);

        fetch('./php/updateUsuario.php', {
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
              window.location.href = 'telaDoUser.php';
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
      }
    });
  });
});


$(document).ready(function() {
  // Evento de clique no botão de exclusão
  $('#btn-excluir').click(function(e) {
    e.preventDefault(); // Evita o comportamento padrão de submit do formulário

    // Exibe um alerta de confirmação antes de excluir a conta
    Swal.fire({
      title: 'Tem certeza?',
      text: 'Deseja realmente excluir sua conta?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      confirmButtonText: 'Sim',
      cancelButtonText: 'Cancelar'
    }).then(function(result) {
      if (result.isConfirmed) {
        // O usuário confirmou a exclusão, envia a requisição AJAX para excluir a conta
        $.ajax({
          url: './php/deletePaciente.php',
          method: 'POST',
          dataType: 'json',
          data: {
            'btn-excluir': true
          },
          success: function(response) {
            if (response.success) {
              // Exclusão bem-sucedida, exibe o SweetAlert de sucesso
              Swal.fire({
                title: 'Dados excluídos!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(function() {
                window.location.href = 'index.php';
              });
            } else {
              // Erro ao excluir os dados, exibe o SweetAlert de erro
              Swal.fire({
                title: 'Erro',
                text: response.message,
                icon: 'error',
                confirmButtonText: 'OK'
              }).then(function() {
                window.location.href = 'telaDoUser.php';
              });
            }
          },
          error: function(xhr, status, error) {
            // Trata erros de solicitação AJAX
            console.error(xhr.responseText);
            // Exibe mensagem de erro genérica
            Swal.fire({
              title: 'Erro',
              text: 'Ocorreu um erro ao excluir os dados.',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        });
      }
    });
  });
});
