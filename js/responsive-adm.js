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

  if(localStorage.length > 0) {
    // Obtém os dados do localStorage
    var dados = localStorage.getItem('dados');

    // Converte os dados de string para objeto
    dados = JSON.parse(dados);

    // Exibe os dados na página
    document.getElementById('dados').innerHTML = '<pre>' + JSON.stringify(dados, null, 2) + '</pre>';
  } else {
    // Exibe mensagem caso não haja dados no localStorage
    document.getElementById('dados').innerHTML = '<p>Nenhum dado encontrado no LocalStorage.</p>';
  }