// Pega as informacoes dos itens abaixo

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

document.querySelector('#agenda')
  .addEventListener('click', () => {
    telaInicial.style.display = "none"
    minhaConta.style.display = "none"
    minhaAgenda.style.display = "flex"
});

document.querySelector('#conta')
  .addEventListener('click', () => {
    telaInicial.style.display = "none"
    minhaAgenda.style.display = "none"
    minhaConta.style.display = "flex"
});

document.querySelector('#inicio')
  .addEventListener('click', () => {
    minhaAgenda.style.display = "none"
    minhaConta.style.display = "none"
    telaInicial.style.display = "flex"
});


class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList = document.querySelector(navList);
      this.navLinks = document.querySelectorAll(navLinks);
      this.activeClass = "active";
  
      this.handleClick = this.handleClick.bind(this);
    }
  
    animateLinks() {
      this.navLinks.forEach((link, index) => {
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${
              index / 7 + 0.3
            }s`);
      });
    }
  
    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }
  
    addClickEvent() {
      this.mobileMenu.addEventListener("click", this.handleClick);
    }
  
    init() {
      if (this.mobileMenu) {
        this.addClickEvent();
      }
      return this;
    }
  }





// Obtém o tbody da tabela
const tbody = document.getElementById('tbody');

// Obtém os dados do localStorage
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

// Adiciona a nova linha ao tbody
tbody.appendChild(novaLinha);

// Adiciona um ouvinte de evento "click" para a linha
novaLinha.addEventListener('click', function() {

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