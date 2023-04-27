// A função 'menuShow()' é responsável por exibir ou ocultar o menu mobile da página,
// alterando a classe do elemento com a classe 'mobile-menu' e a imagem do ícone
function menuShow() {
  let menuMobile = document.querySelector('.mobile-menu');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
      // Altera a imagem do ícone para o ícone do menu quando o menu está fechado
      document.querySelector('.icon').src = "../img/menu_white_36dp.svg";
  } else {
      menuMobile.classList.add('open');
      // Altera a imagem do ícone para o ícone de fechar quando o menu está aberto
      document.querySelector('.icon').src = "../img/close_white_36dp.svg";
  }
}

// Pega as informacoes dos itens abaixo
// O código abaixo seleciona elementos HTML através dos seus IDs e classes, e atribui a variáveis para manipulação posterior
var conta = document.querySelector('#conta');
var agenda = document.querySelector('#agenda');
var contaResponsiva = document.querySelector('#conta-responsiva');
var agendaResponsiva = document.querySelector('#agenda-responsiva');
var inicio = document.querySelector('#inicio');
var listar = document.querySelector('#listar');
var confirmarCancelar = document.querySelector('.confirmar-cancelar');
var btnConfirmar = document.querySelector('#confirmar');
var btnCancelar = document.querySelector('#cancelar');
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
inicio.addEventListener('click', function() {
  minhaAgenda.style.display = 'none';
  minhaConta.style.display = 'none';
  telaInicial.style.display = 'flex';
});

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

// Obtém o tbody da tabela
const tbody = document.getElementById('tbody');

// Obtém os dados do localStorage
const agendamento = JSON.parse(localStorage.getItem('agendamento'));

// Cria uma nova linha na tabela com os dados do agendamento
const novaLinha = document.createElement('tr');

// Adiciona a nova linha ao final do tbody da tabela
tbody.appendChild(novaLinha);
//se nao haver agendamentos
if (!agendamento) {
    // Adiciona uma mensagem de aviso
    const mensagem = document.createElement('p');
    mensagem.innerHTML = 'Não há agendamentos.';
    novaLinha.style.textAlign = 'center';
    tbody.appendChild(mensagem);
    //centraliza p no meio da linha
  } else {
    // Adiciona os dados do agendamento na linha


    novaLinha.innerHTML = `
      <td>${agendamento.nome}</td>
      <td>${agendamento.cpf}</td>
      <td>${agendamento.email}</td>
      <td>${agendamento.telefone}</td>
      <td>${agendamento.doutor}</td>
      <td>${agendamento.procedimento}</td>
      <td>${agendamento.data}</td>
      <td>${agendamento.hora}</td>
      <td>${agendamento.status}</td>
    `;
    //atualiza as linha de frequentemente
    tbody.appendChild(novaLinha);

    // Adiciona um ouvinte de evento "click" para a nova linha
    novaLinha.addEventListener('click', function() {

    // Alterna a exibição do elemento com id "confirmarCancelar" entre "table-row" e "none"
    if (confirmarCancelar.style.display === "table-row"){
      confirmarCancelar.style.display = "none"
    } else {
      confirmarCancelar.style.display = "table-row"
    }

        // Adiciona um status de "confimada" em "agendamento" ao botao de confirmar ser clicado
      btnConfirmar.addEventListener("click", function() {
        // Adiciona um status de "confirmada" em "agendamento"
        agendamento.status = "confirmada";
        // Salva o agendamento no localStorage
        localStorage.setItem('agendamento', JSON.stringify(agendamento));
      }) // Adiciona um status de "cancelada" em "agendamento" ao botao de cancelar ser clicado

      btnCancelar.addEventListener("click", function() {
        // Adiciona um status de "cancelada" em "agendamento"
        agendamento.status = "cancelada";
        // Salva o agendamento no localStorage
        localStorage.setItem('agendamento', JSON.stringify(agendamento));
      })

})};