<?php
include('./php/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agendamentos</title>
  <link rel="stylesheet" href="./css/telaUser.css">
  <link rel="shortcut icon" href="./img/Dente.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <!-- Cabeçalho da página -->
    <header>
        <!--nav aonde fica os elementos do menu-->
        <nav class="nav-bar">
            <!--div para o logo-->
            <div class="logo">
              <a href="./telaDoUser.php"><h1>Odonto Bia</h1></a>
            </div>
            <!--div para a lista de itens do menu-->

            <div class="nav-list">
                <ul>
                    <!--item de agenda-->
                    <li id="agenda" class="nav-item"><button class="item-menu">
                        Agenda
                    </button></li>

                     <!--item de Fazer Agendamento so pode ser usado pelo PACIENTE-->
                    <?php
                        // Verifica se o usuário logado é um médico
                        if (isset($_SESSION['id_medico'])) {
                            // Não exibe o botão de agendamento para médicos
                        } else {
                            // Exibe o botão de agendamento para pacientes
                            echo '<li class="nav-item"><a href="./agendamento.php"><button class="item-menu">
                                Fazer Agendamento
                            </button></a></li>';
                        }
                    ?>

                    <!--item para a conta-->
                    <li id="conta" class="nav-item"><button class="item-menu">
                      <!-- <img src="./img/user-svgrepo-com.svg" class="icone" alt="user"> -->
                      <?php
                          if (isset($_SESSION['nome_paciente']) || isset($_SESSION['nome_medico'])) {
                                $prefixo = '';
                              if (isset($_SESSION['nome_medico'])) {
                                  $prefixo = 'Dr. ';
                              }
                              echo '<div title="Usuário logado"><i class="fas fa-user"></i> ' . $prefixo . explode(' ', $nome)[0] . '</div>';
                          } else {
                              echo '<div title="Usuário não logado"></div>';
                          }
                      ?>
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

                     <!--item de Fazer Agendamento so pode ser usado pelo PACIENTE-->
                     <?php
                        // Verifica se o usuário logado é um médico
                        if (isset($_SESSION['id_medico'])) {
                            // Não exibe o botão de agendamento para médicos
                        } else {
                            // Exibe o botão de agendamento para pacientes
                            echo '<li class="nav-item"><a href="./agendamento.php"><button class="item-menu">
                                Fazer Agendamento
                            </button></a></li>';
                        }
                    ?>

                    <!--item para a conta-->
                    <li id="conta-responsiva" class="nav-item"><button class="item-menu">
                      <?php
                        if (isset($_SESSION['nome_paciente']) || isset($_SESSION['nome_medico'])) {
                            $prefixo = '';
                          if (isset($_SESSION['nome_medico'])) {
                            $prefixo = 'Dr. ';
                          }
                            echo '<div title="Usuário logado"><i class="fas fa-user"></i> ' . $prefixo . explode(' ', $nome)[0] . '</div>';
                        } else {
                            echo '<div title="Usuário não logado"></div>';
                        }
                      ?>
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


          $cpf = $_SESSION['cpf_paciente'];
          $email = $_SESSION['email_paciente'];
          $telefone = $_SESSION['telefone_paciente'];

          

        } elseif (isset($_SESSION['nome_medico'])) {
          $nome = $_SESSION['nome_medico'];
          echo "Bem-vindo, Dr $nome!";


          $cpf = $_SESSION['cpf_medico'];
          $email = $_SESSION['email_medico'];
          $telefone = $_SESSION['telefone_medico'];
        }
        
      ?>
      </h1>
    </div>


    <div class="minha-agenda">

      <div class="limiter">
        <div class="container-table100">
          <div class="wrap-table100">
              <div class="table100">
                <!-- Título da seção de agendamentos -->
                <h1 class="title">Consultas Agendadas</h1>
                <table>
                  <thead>
                    <tr class="table100-head">
                      <th class="column1">Paciente</th>
                      <th class="column2">Medico</th>
                      <th class="column3">Procedimento</th>
                      <th class="column4">Data</th>
                      <th class="column5">Horario</th>
                      <th class="column6">Status</th>
                    </tr>
                  </thead>
                  <tbody id="linha-consulta">
                    <tr>
                      <button id="confirmar-btn" class="confirmar-btn">Confirmar</button>
                      <button id="nao-confirmar-btn" class="nao-confirmar-btn">Não Confirmar</button>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>  
      
    </div>


    <!-- Seção para alterar os dados do usuário -->
    <div class="minha-conta">

      <form id="alterar" action="./php/updateUsuario.php" method="POST">

        <!-- Título da página -->

        <h2 class="title-altera-dados">Alterar Dados</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
          <!-- Sessão de alteração do nome  -->
          <div class="altera-dados">
            <input value="<?php echo $nome; ?>" id="nome" name="nome" type="text">
            <label>NOME</label>
          </div>
      
          <!-- Sessão de alteração do telefone  -->
          <div class="altera-dados">
            <input value="<?php echo $telefone; ?>" id="telefone" name="telefone" type="tel" onkeyup="mascaraTelefone(this)" maxlength="14">
            <label>TELEFONE</label>
          </div>
      
          <!-- Sessão de alteração do e-mail  -->
          <div class="altera-dados1">
            <input value="<?php echo $email; ?>" id="email" name="email" type="email">
            <span>E-MAIL</span>
          </div>
      
          <!-- Sessão de alteração da senha  -->
          <div class="altera-dados">
            <input id="nova_senha" name="nova_senha" type="password" minlength="8">
            <label>NOVA SENHA</label>
          </div>

          <div class="altera-dados">
            <input id="confirma_nova_senha" name="confirma_nova_senha" type="password" minlength="8">
            <label>CONFIRMAR NOVA SENHA</label>
          </div>
      
          <!-- Sessão de confirmacao da senha  -->
          <div class="altera-dados">
            <input id="confirmarSenha" name="confirma_senha" type="password" minlength="8">
            <label>SENHA ATUAL</label>
          </div>

          <!-- Botão que salva as alterações feitas  -->
          <button type="submit" name="btn-salvar" class="btn-salvar">
              SALVAR
            <div class="arrow-wrapper">
                <div class="arrow"></div>
          
                </div>
          </button>


      </form>

        
      <?php
        // Verifica se o usuário logado é um médico
        if (isset($_SESSION['id_medico'])) {
        // Não exibe o botão de agendamento para médicos
        } else {
          echo '<form id="delete" method="post" action="./php/deletePaciente.php">
          <button id="btn-excluir" type="submit" name="btn-excluir" class="btn-excluir">Excluir Conta</button>
            </form>';
        }
      ?>

      

    </div>

    

  <!-- Script para responsividade da página -->
  <script src="./js/responsive-user.js"></script>
  <script src="./js/testVer.js"></script>
  <script src="./js/mascaras.js"></script>
</body>
</html>