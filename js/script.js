function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon').src = "/TrabalhoIntegrador/image/menu_white_36dp.svg";
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon').src = "/TrabalhoIntegrador/image/close_white_36dp.svg";
    }
}

window.addEventListener('resize', function(event){
    // Recalcula a largura da imagem quando a tela é redimensionada
    var imagens = document.getElementsByClassName('conteudo-principal-imagem');
    for(var i = 0; i < imagens.length; i++){
      imagens[i].style.width = '100%';
    }

    var paragrafos = document.getElementsByClassName('conteudo-secundario-paragrafo');
    for(var i = 0; i < paragrafos.length; i++){
      paragrafos[i];
    }

    var titulos = document.getElementsByClassName('conteudo-principal-escrito-titulo');
    for(var i = 0; i < titulos.length; i++){
      titulos[i].style.fontSize = '5vw';
    }

    var titulos = document.getElementsByClassName('conteudo-principal-escrito-subtitulo');
    for(var i = 0; i < titulos.length; i++){
      titulos[i].style.fontSize = '5vw';
    }

    var titulos = document.getElementsByClassName('conteudo-secundario-titulo');
    for(var i = 0; i < titulos.length; i++){
      titulos[i].style.fontSize = '5vw';
    }

  });

  
  