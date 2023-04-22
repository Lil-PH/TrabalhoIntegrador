function menuShow() {
  let menuMobile = document.querySelector('.mobile-menu');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
      document.querySelector('.icon').src = "./image/menu_white_36dp.svg";
  } else {
      menuMobile.classList.add('open');
      document.querySelector('.icon').src = "./image/close_white_36dp.svg";
  }
}

function tornarInvisivel() {
  var contenedor = document.getElementById("visible");
  contenedor.style.display = "none";
}

window.addEventListener("scroll", function() {
  var contenedor = document.getElementById("visible");
  contenedor.style.display = "block";
});

function sendWhatsApp() {
  var userAgent = navigator.userAgent.toLowerCase();
  var isAndroid = userAgent.indexOf("android") > -1;
  var isIos = userAgent.indexOf("iphone") > -1 || userAgent.indexOf("ipad") > -1;

    if (isAndroid) {
        window.location.href = "https://api.whatsapp.com/send?phone=5527998557801&text=sua%20mensagem";
    } else if (isIos) {
        window.location.href = "https://api.whatsapp.com/send?phone=5527998557801&text=sua%20mensagem";
    } else {
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
