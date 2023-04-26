// A função 'menuShow()' é responsável por exibir ou ocultar o menu mobile da página,
// alterando a classe do elemento com a classe 'mobile-menu' e a imagem do ícone.
function menuShow() {
  let menuMobile = document.querySelector('.mobile-menu');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
      // Altera a imagem do ícone para o ícone do menu quando o menu está fechado
      document.querySelector('.icon').src = "./image/menu_white_36dp.svg";
  } else {
      menuMobile.classList.add('open');
      // Altera a imagem do ícone para o ícone de fechar quando o menu está aberto
      document.querySelector('.icon').src = "./image/close_white_36dp.svg";
  }
}

// A função 'sendWhatsApp()' é responsável por enviar uma mensagem para um número de telefone
// através do WhatsApp. A função verifica se o usuário está utilizando um dispositivo Android
// ou iOS e redireciona para a URL correta do WhatsApp. Caso contrário, abre uma nova janela
// com a URL do WhatsApp Web.
function sendWhatsApp() {
  var userAgent = navigator.userAgent.toLowerCase();
  var isAndroid = userAgent.indexOf("android") > -1;
  var isIos = userAgent.indexOf("iphone") > -1 || userAgent.indexOf("ipad") > -1;

    if (isAndroid) {
        // Abre o WhatsApp com o número e mensagem pré-definidos para dispositivos Android
        window.location.href = "https://api.whatsapp.com/send?phone=5527998557801&text=sua%20mensagem";
    } else if (isIos) {
        // Abre o WhatsApp com o número e mensagem pré-definidos para dispositivos iOS
        window.location.href = "https://api.whatsapp.com/send?phone=5527998557801&text=sua%20mensagem";
    } else {
        // Abre o WhatsApp Web com o número pré-definido em uma nova janela
        window.open("https://web.whatsapp.com/send?phone=5527998557801", '_blank');
    }
}



// window.addEventListener('resize', function(event){

//   var paragrafos = document.getElementsByClassName('conteudo-secundario-paragrafo');
//   for(var i = 0; i < paragrafos.length; i++){
//     paragrafos[i];
//   }

//   var titulos = document.getElementsByClassName('conteudo-principal-escrito-titulo');
//   for(var i = 0; i < titulos.length; i++){
//     titulos[i].style.fontSize = '5vw';
//   }

//   var titulos = document.getElementsByClassName('conteudo-principal-escrito-subtitulo');
//   for(var i = 0; i < titulos.length; i++){
//     titulos[i].style.fontSize = '5vw';
//   }

//   var titulos = document.getElementsByClassName('conteudo-secundario-titulo');
//   for(var i = 0; i < titulos.length; i++){
//     titulos[i].style.fontSize = '5vw';
//   }

// });
