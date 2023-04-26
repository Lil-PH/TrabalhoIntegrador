// Pega as informacoes dos itens abaixo
// O código abaixo seleciona elementos HTML através dos seus IDs e classes, e atribui a variáveis para manipulação posterior
var conta = document.querySelector('#conta');
var agenda = document.querySelector('#agenda');
var inicio = document.querySelector('#inicio');
var listar = document.querySelector('#listar');
var confirmarCancelar = document.querySelector('.confirmar-cancelar');
var minhaAgenda = document.querySelector('.minha-agenda');
var minhaConta = document.querySelector('.minha-conta');
var telaInicial = document.querySelector('.tela-inicial');

// altera a estética da div cadastro e login

// function menuShow() {
//   let menuMobile = document.querySelector('.mobile-menu');
//   if (menuMobile.classList.contains('open')) {
//       menuMobile.classList.remove('open');
//       document.querySelector('.icon').src = "./image/menu_white_36dp.svg";
//   } else {
//       menuMobile.classList.add('open');
//       document.querySelector('.icon').src = "./image/close_white_36dp.svg";
//   }
// }

// Quando o elemento com id "agenda" for clicado, irá ocultar as telas iniciais e de conta, e exibir a tela da agenda
document.querySelector('#agenda')
  .addEventListener('click', () => {
    telaInicial.style.display = "none"
    minhaConta.style.display = "none"
    minhaAgenda.style.display = "flex"
});

// Quando o elemento com id "conta" for clicado, irá ocultar as telas iniciais e da agenda, e exibir a tela da conta
document.querySelector('#conta')
  .addEventListener('click', () => {
    telaInicial.style.display = "none"
    minhaAgenda.style.display = "none"
    minhaConta.style.display = "flex"
});

// Quando o elemento com id "inicio" for clicado, irá ocultar as telas da agenda e de conta, e exibir a tela inicial
document.querySelector('#inicio')
  .addEventListener('click', () => {
    minhaAgenda.style.display = "none"
    minhaConta.style.display = "none"
    telaInicial.style.display = "flex"
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
    
    //método handleClick que irá executar quando ocorrer um evento de clique em um dos links do menu de navegação
    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }
    
    //método que irá adicionar eventos de clique para cada link do menu de navegação
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





// Seleciona o elemento tbody da tabela
const tbody = document.getElementById('tbody');

// Obtém os dados do agendamento armazenados no localStorage e converte em objeto JavaScript
const agendamento = JSON.parse(localStorage.getItem('agendamento'));

// Cria uma nova linha na tabela com os dados do agendamento
const novaLinha = document.createElement('tr');
novaLinha.innerHTML = `
  <td>${agendamento.nome}</td>
  <td>${agendamento.cpf}</td>
  <td>${agendamento.email}</td>
  <td>${agendamento.telefone}</td>
  <td>${agendamento.doutor}</td>
  <td>${agendamento.procedimento}</td>
  <td>${agendamento.data}</td>
  <td>${agendamento.hora}</td>
`;

// Adiciona a nova linha ao final do tbody da tabela
tbody.appendChild(novaLinha);

// Adiciona um ouvinte de evento "click" para a nova linha
novaLinha.addEventListener('click', function() {

  // Alterna a exibição do elemento com id "confirmarCancelar" entre "table-row" e "none"
  if (confirmarCancelar.style.display === "table-row"){
    confirmarCancelar.style.display = "none"
  } else {
    confirmarCancelar.style.display = "table-row"
  }
  // // Exibe um prompt de confirmação
  // const confirmacao = confirm('Deseja confirmar este agendamento?');
  
  // if (confirmacao) {
  //   // Se o usuário confirmar, define o status do agendamento como "confirmado"
  //   agendamento.status = 'confirmado';
  //   localStorage.setItem('agendamento', JSON.stringify(agendamento));
    
  //   // Atualiza a linha na tabela
  //   novaLinha.classList.add('confirmado');
  // } else {
  //   // Se o usuário cancelar, define o status do agendamento como "cancelado"
  //   agendamento.status = 'cancelado';
  //   localStorage.setItem('agendamento', JSON.stringify(agendamento));
    
  //   // Atualiza a linha na tabela
  //   novaLinha.classList.add('cancelado');
  // }
});  