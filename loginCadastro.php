<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Cadastro</title>
  <link rel="stylesheet" href="./css/loginCadastro.css">
  <link rel="shortcut icon" href="./img/Dente.png" type="img/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <!-- Seção do formulário de login -->
  <div class="login-box">
    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnLogin">Login</button>
      <button id="btnCadastro">Cadastrar</button>
    </div>

    <!-- Seção do formulário de login -->
    <form id="login" action="./php/validarUsuario.php" method="POST">

      <!-- Campo de entrada para CPF-->
      <div class="user-box espaco">
        <input name="emailLogin" type="text" autocomplete="off">
        <label>Email ou CRM</label>
      </div>

      <!-- Campo de entrada para senha -->
      <div class="user-box">
        <input name="senhaLogin" type="password" autocomplete="off">
        <label>SENHA</label>
      </div>
      
      <!-- Link para a página de "Esqueceu a Senha" -->
      <!-- <div class="esqueceu-senha">
        <a href="#" id="esqueceuSenhaLink">Esqueceu a senha?</a>
      </div> -->
      
     <div class="botaos">

      
        <a href="./index.php"><button type="button" class="btnVoltar espaco">
            VOLTAR
        </button></a>

        <!-- Botão dpara fazer login -->
        <button type="submit" class="btnLogar espaco">
           ENTRAR
         <!-- <div class="arrow-wrapper">
                <div class="arrow"></div>
    
            </div> -->
        </button>
     </div>
    </form>

    <!-- Seção do formulário para cadastro -->
    <form id="cadastro" action="./php/createPaciente.php" method="POST">

       <!-- Campo de entrada para CPF-->
      <div class="user-box">
        <input id="nome" name="nomeCadastro" type="text" autocomplete="off" required>
        <label>NOME</label>
      </div>

      <!-- Campo de entrada para nome do usuario -->
      <div class="user-box">
        <input id="cpf" name="cpfCadastro" type="text" maxlength="14" autocomplete="off" required onkeyup="mascaraCPF(this)">
        <label>CPF</label>
      </div>

      <!-- Campo de entrada para número de telefone -->
      <div class="user-box">
        <input id="telefone" name="telefoneCadastro" type="tel" maxlength="15" autocomplete="off" onkeyup="mascaraTelefone(this)" required>
        <label>TELEFONE</label>
      </div>

      <!-- Campo de entrada para e-mail -->
      <div class="user-box1">
        <input id="email" name="emailCadastro" type="email" autocomplete="off" required>
        <span>E-MAIL</span>
      </div>

      <!-- Campo de entrada para senha -->
      <div class="user-box">
        <input id="senha" name="senhaCadastro" type="password" autocomplete="off" minlength="8" required>
        <label>SENHA</label>
      </div>

      <!-- Campo de entrada para confirmação da senha -->
      <div class="user-box">
        <input id="confirmarSenha" name="confirma_senha" type="password" autocomplete="off" minlength="8" required>
        <label>CONFIRMAR SENHA</label>
      </div>

        <!-- Botão para fazer o registro do "usuario" -->
        <button type="submit" class="btnCadastrar">
            CADASTRAR
            <div class="arrow-wrapper">
                <div class="arrow"></div>
    
            </div>
        </button>
    </form>
  </div>
  <!-- scripts a serem utilizados -->
  <script src="./js/mascaras.js"></script>
  <script src="./js/alerts.js"></script>
  <script src="./js/functionLogin.js"></script>
</body>
</html>