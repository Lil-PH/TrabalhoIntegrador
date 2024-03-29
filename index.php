<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AV.Belo Horizonte, 1098, Praiamar - nova almeida contato (27)99855-7801">
    <link rel="stylesheet" href="./css/style.css">
    <title>Odonto Bia</title>
    <link rel="shortcut icon" href="./img/Dente.png" type="img/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Botão do whatsapp -->
    <!-- Adiciona um link para o WhatsApp com um número de telefone e uma função de envio -->
    <a class="whatsapp-link" href="https://web.whatsapp.com/send?phone=5527998557801" target="_blank" onclick="sendWhatsApp()">
        <i class="fa fa-whatsapp"></i>
    </a>
    <!-- Cabeçalho da página -->
    <header>
        <!-- Navegação da página, onde ficam os elementos do menu -->
        <nav class="nav-bar">
            <!-- Logotipo da empresa -->
            <div class="logo">
                <a href="#inicio"><h1>Odonto Bia</h1></a>
            </div>
            <!-- Lista de navegação com links para diferentes seções da página -->
            <div class="nav-list">
                <ul>
                    <li class="nav-item" ><a href="#sobre"><button class="item-menu">
                        SOBRE
                    </button></a></li>
                    <li class="nav-item"><a href="#localizacao"><button class="item-menu">
                        LOCALIZAÇÃO
                    </button></a></li>
                    <li class="nav-item"><a href="#funcionalidade"><button class="item-menu">
                        FUNCIONALIDADE
                    </button></a></li>
                    <li class="nav-item"><a href="#contato"><button class="item-menu">
                        CONTATO
                    </button></a></li>
                    <!-- Link para a página de login/cadastro -->
                    <li class="nav-item"><a href="./loginCadastro.php"><button class="item-menu">
                        LOGIN
                        <!-- Ícone de usuário -->
                        <img src="./img/user-svgrepo-com.svg" class="icons" alt="user">
                    </button></a></li>
                </ul>
            </div>

            <!-- Ícone do menu para dispositivos móveis -->
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="./img/menu_white_36dp.svg" alt=""></button>
            </div>
        </nav>
        <!-- Div para o menu móvel que aparece quando o ícone do menu é clicado -->
        <div class="mobile-menu">
                <ul>
                    <!-- Links para diferentes seções da página -->
                    <li class="nav-item"><a href="#sobre"><button class="item-menu">
                        SOBRE
                    </button></a></li>
                    <li class="nav-item"><a href="#localizacao"><button class="item-menu">
                        LOCALIZAÇÃO
                    </button></a></li>
                    <li class="nav-item"><a href="#funcionalidade"><button class="item-menu">
                        FUNCIONALIDADE
                    </button></a></li>
                    <li class="nav-item"><a href="#contato"><button class="item-menu">
                        CONTATO
                    </button></a></li>
                    <!-- Link para a página de login/cadastro -->
                    <li class="nav-item"><a href="./loginCadastro.php"><button class="item-menu">
                        LOGIN
                    </button></a></li>
                </ul>
        </div>

    </header>

    <!-- O elemento 'main' engloba todo o conteúdo principal da página -->
    <main class="conteudo">
        <!-- A seção 'conteudo-principal' contém a imagem principal 
        e um botão para agendamento -->
        <section class="conteudo-principal">
            <div class="conteudo-principal-escrito">
                 <!-- O título da página é definido aqui -->
                <h1 class="conteudo-principal-escrito-titulo"><a name="inicio"></a>Odonto Bia</h1>
                <!-- Um subtitulo é adicionado para complementar o título -->
                <h2 class="conteudo-principal-escrito-subtitulo">Cuidar do seu sorriso nunca foi tão fácil!</h2>
                
                <!-- Um botão de agendamento é adicionado para facilitar 
                o acesso ao formulário de agendamento -->
                <a href="./loginCadastro.php"><button class="botao">
                    FAZER AGENDAMENTO
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>
                
                    </div>
                </button></a>

            </div>

            <!-- A imagem principal é adicionada ao lado do texto -->
            <img class="conteudo-principal-imagem" src="./img/Dente.png" alt="image"/>

        </section>

        <!-- A seção 'conteudo-secundario' contém uma breve descrição 
        da funcionalidade e um mapa da localização -->
        <section class="conteudo-secundario">

            <!-- O primeiro elemento contém um título e uma descrição -->

            <div class="elementos">
                <!-- Imagem para a seção sobre -->
                <img class="conteudo-secundario-imagem imagem" src="./img/dentista.jpeg" alt="imgem teste" >
                <div class="conteudo-secundario-escrito">
                    <!-- Título para a seção sobre -->
                    <h1 class="conteudo-secundario-titulo"><a name="sobre"></a>SOBRE</h1>
                    <!-- Informação sobre a clínica odontológica -->
                    <p class="conteudo-secundario-paragrafo">Cuidar da saúde bucal previne problemas e afeta diretamente a autoestima. Mantenha uma rotina de cuidados e visite o dentista regularmente para garantir um sorriso saudável e feliz.</p>
                </div>
            </div>

            <!-- O segundo elemento contém um mapa interativo da localização da clínica -->

            <div class="elementos">
                
                <div class="conteudo-secundario-escrito">
                    <!-- Título para a seção de localização -->
                    <h1 class="conteudo-secundario-titulo"><a name="localizacao"></a>LOCALIZAÇÃO</h1>
                    <!-- Informação sobre o endereço da clínica -->
                    <p class="conteudo-secundario-paragrafo">AV.Belo Horizonte, 1098, Praiamar - nova almeida</p>
                </div>

                <div>
                    <!-- Inclusão de um mapa responsivo através de um iframe -->
                    <iframe class="mapa-responsivo" src="https://www.openstreetmap.org/export/embed.html?bbox=-40.203250050544746%2C-20.04729651170039%2C-40.198770761489875%2C-20.04493050131225&amp;layer=mapnik&amp;marker=-20.0461135109626%2C-40.2010104060173">
                    <!-- Adição de um link para ver o mapa ampliado -->
                    </iframe><br/><small class="conteudo-secundario-paragrafo"><a class="cor_link" href="https://goo.gl/maps/EpYzCrizPWRUkgS2A" target="_blank">Ver mapa ampliado</a></small>
                </div>

            </div>

            <div class="elementos">
                <!-- A imagem complementa a descrição da funcionalidade -->
                <img class="conteudo-secundario-imagem" src="./img/agendando.jpeg" alt="imgem teste" >
                
                <div class="conteudo-secundario-escrito">
                    <h1 class="conteudo-secundario-titulo"><a name="funcionalidade"></a>FUNCIONALIDADE</h1>
                    <p class="conteudo-secundario-paragrafo">Agendamento simples e rápido de consultas! </p>
                </div>

            </div>
                
        </section>
            
    </main>
        
    <!-- Adicionando o arquivo de script -->
    <script src="./js/script.js"></script>

    <!-- Rodapé da pagina -->    
    <footer class="rodape">
        <!-- Imagem do rodapé -->
        <section class="conteudo-footer">     
            <div class="conteudo-footer-escrito">
                <h1 class="conteudo-footer-titulo"><a name="contato">CONTATOS:</a></h1>
                <p class="conteudo-footer-paragrafo">Bem-vindo(a) ao nosso site de agendamentos odontológico. Estamos presentes em diversas redes sociais para manter uma comunicação fácil e acessível com nossos pacientes.</p>
            </div>
            <div class="icones-footer">
                <a class="facebook-footer" href="https://www.facebook.com/profile.php?id=100041564055788" target="_blank"><i class="fa fa-facebook"></i></a>
                <a class="whatsapp-footer" href="https://web.whatsapp.com/send?phone=5527998557801" target="_blank"><i class="fa fa-whatsapp"></i></a>
                <a class="instagram-footer" href="https://www.instagram.com/odontobiaserra/" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
        </section>
        <div class="direitos-footer">
            <p class="diretos-reservados">Created by OdontoBia. © 2023</p>
        </div>
    </footer>

</body>

</html>