<?php
include('./php/protect.php');
include('./php/updateMedico.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agendamentos</title>
  <link rel="stylesheet" href="./css/telaAdm.css">
  <link rel="shortcut icon" href="./img/Dente.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Cabeçalho da página -->
    <header>
        <!--nav aonde fica os elementos do menu-->
        <nav class="nav-bar">
            <!--div para o logo-->
            <div class="logo">
                <h1 id="inicio">Odonto Bia</h1>
            </div>
            <!--div para a lista de itens do menu-->
            <div class="nav-list">
                <ul>
                    <!--item de agenda-->
                    <li id="agenda" class="nav-item"><button class="item-menu">
                        Agenda
                    </button></li>
                    <!--item de Fazer Agendamento-->
                    <li class="nav-item"><a href="./agendamento.php"><button class="item-menu">
                        Fazer Agendamento
                    </button></a></li>
                    <!--item para ver o site-->
                    <li class="nav-item"><a href="./index.php"><button class="item-menu">
                        Ver Site
                    </button></a></li>
                    <!--item para a conta-->
                    <li id="conta" class="nav-item"><button class="item-menu">
                        Conta
                    </button></li>
                    <!--item para sair-->
                    <li class="nav-item"><a href="./php/logout.php"><button class="item-menu">
                        Sair
                    </button></a></li>
                </ul>
            </div>
            <!--botão para menu responsivo-->
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="./img/menu_white_36dp.svg" alt=""></button>
            </div>
        </nav>
        <!--menu responsivo-->
        <div class="mobile-menu">
                <ul>
                    <!--item de agenda-->
                    <li id="agenda-responsiva" class="nav-item"><button class="item-menu">
                        Agenda
                    </button></li>
                    <!--item de Fazer Agendamento-->
                    <li class="nav-item"><a href="./agendamento.php"><button class="item-menu">
                        Fazer Agendamento
                    </button></a></li>
                    <!--item para ver o site-->
                    <li class="nav-item"><a href="./index.php"><button class="item-menu">
                        Ver Site
                    </button></a></li>
                    <!--item para a conta-->
                    <li id="conta-responsiva" class="nav-item"><button class="item-menu">
                        Conta
                    </button></li>
                    <!--item para sair-->
                    <li class="nav-item"><a href="./php/logout.php"><button class="item-menu">
                        Sair
                    </button></a></li>
                </ul>
        </div>
    
    </header>

    <div class="tela-inicial">  
      <!--Título de boas-vindas-->
      <h1 class="bem-vindo">
      <?php
      
        if (isset($_SESSION['nome_paciente'])) {
          $nome = $_SESSION['nome_paciente'];
          echo "Bem-vindo $nome!";

        } elseif (isset($_SESSION['nome_medico'])) {
          $nome = $_SESSION['nome_medico'];
          echo "Bem-vindo, Dr $nome!";

        }
        
      ?>
      </h1>
    </div>

    <div class="minha-agenda">
      <div class="lista">
        <!--Título da seção de agendamentos-->
        <h1 class="title">Consultas Agendadas</h1>
          <!--Tabela de agendamentos-->
          <table>
            <thead>
              <!--Cabeçalho da tabela-->
              <tr class="lista-elementos">
                  <th class="column1">Nome</th>
                  <th class="column2">Doutor</th>
                  <th class="column3">Data</th>
                  <th class="column4">Horario inicial</th>
                  <th class="column5">Horario final</th>
              </tr>
            </thead>
            <!--Corpo da tabela (conteúdo dinâmico gerado por JavaScript)-->
            <tbody id="tbody">
              <tr>
                <!-- <td><?php echo $agendamento['nome_paciente']; ?></td>
                <td><?php echo $agendamento['nome_medico']; ?></td>
                <td><?php echo $agendamento['data']; ?></td>
                <td><?php echo $agendamento['horario_inicial']; ?></td>
                <td><?php echo $agendamento['horario_final']; ?></td> -->
              </tr>
            </tbody>
          </table>
      </div>  
    </div>

    <!-- Seção para alterar os dados do usuário -->
    <div class="minha-conta">
      <form id="alterar" action="./php/updateMedico.php" method="POST">

        <!-- Título da página -->

        <h2 class="title-altera-dados">Alterar Dados</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
          <!-- Sessão de alteração do nome  -->
          <div class="altera-dados">
            <input value="" id="nome" name="nome" type="text">
            <label>NOME</label>
          </div>
      
          <!-- Sessão de alteração do telefone  -->
          <div class="altera-dados">
            <input value="" id="telefone" name="telefone" type="tel" maxlength="14">
            <label>TELEFONE</label>
          </div>
      
          <!-- Sessão de alteração do e-mail  -->
          <div class="altera-dados1">
            <input value="" id="email" name="email" type="email">
            <span>E-MAIL</span>
          </div>
      
          <!-- Sessão de alteração da senha  -->
          <div class="altera-dados">
            <input id="senha" name="senha" type="password" minlength="8">
            <label>SENHA</label>
          </div>
      
          <!-- Sessão de confirmacao da senha  -->
          <div class="altera-dados">
            <input id="confirmarSenha" name="confirma_senha" type="password" minlength="8">
            <label>CONFIRMAR SENHA</label>
          </div>
      
          <!-- Botão que salva as alterações feitas  -->
          <button type="submit" name="btn-salvar" class="btn-salvar">
              SALVAR
            <div class="arrow-wrapper">
                <div class="arrow"></div>
          
                </div>
          </button>
      </form>
    </div>
  <!-- Script para responsividade da página -->
  <script src="./js/responsive-adm.js"></script>
</body>
</html>