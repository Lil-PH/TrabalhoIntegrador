<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Cadastro</title>
  <link rel="stylesheet" href="./css/loginCadastro.css">
  <link rel="shortcut icon" href="./img/Dente.png" type="img/x-icon">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" crossorigin="anonymous"></script>
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
    <form id="login">

      <!-- Campo de entrada para CPF-->
      <div class="user-box">
        <input id="cpfLogin" name="" type="text" maxlength="14" autocomplete="off" required>
        <label>CPF</label>
      </div>

      <!-- Campo de entrada para senha -->
      <div class="user-box">
        <input id="senhaLogin" name="" type="password" autocomplete="off" required>
        <label>SENHA</label>
      </div>

      <!-- Caixa de seleção para lembrar a senha -->
      <div class="divCheck">
        <input type="checkbox" />
        <span>Lembrar senha</span>
      </div>

        <!-- Botão dpara fazer login -->
        <button type="submit" class="btnLogar" onclick="fazerLogin()">
            ENTRAR
            <div class="arrow-wrapper">
                <div class="arrow"></div>
    
            </div>
        </button>
    </form>

    <!-- Seção do formulário para cadastro -->
    <form id="cadastro">

       <!-- Campo de entrada para CPF-->
      <div class="user-box">
        <input id="nome" name="nome" type="text" autocomplete="off" required>
        <label>NOME</label>
      </div>

      <!-- Campo de entrada para nome do usuario -->
      <div class="user-box">
        <input id="cpf" name="cpf" type="text" maxlength="14" autocomplete="off" required>
        <label>CPF</label>
      </div>

      <!-- Campo de entrada para número de telefone -->
      <div class="user-box">
        <input id="telefone" name="telefone" type="tel" maxlength="14" autocomplete="off" onkeyup="mascara_telefone()" required>
        <label>TELEFONE</label>
      </div>

      <!-- Campo de entrada para e-mail -->
      <div class="user-box1">
        <input id="email" name="email" type="email" autocomplete="off" required>
        <span>E-MAIL</span>
      </div>

      <!-- Campo de entrada para senha -->
      <div class="user-box">
        <input id="senha" name="senha" type="password" autocomplete="off" minlength="8" required>
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
  <script src="./js/fazLogin.js"></script>
</body>
</html>