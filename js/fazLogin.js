function criarConta() {
    // Obtém as informações do formulário
    var nome = document.getElementById("nome").value;
    var telefone = document.getElementById("telefone").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmarSenha").value;
 
    // Verifica se todas as informações foram preenchidas
    if (nome === "" || telefone === "" || email === "" || senha === "" || confirmarSenha === "") {
      alert("Por favor, preencha todos os campos.");
      return;
    }
 
    // Verifica se as senhas correspondem
    if (senha !== confirmarSenha) {
      alert("As senhas não correspondem.");
      return;
    }
 
    // Armazena as informações no localStorage
    localStorage.setItem("nome", nome);
    localStorage.setItem("telefone", telefone);
    localStorage.setItem("email", email);
    localStorage.setItem("senha", senha);
 
    // Exibe uma mensagem de sucesso
    console.log("Conta criada com sucesso!");
    alert("Conta criada com sucesso!");
 
    // Redireciona o usuário para a página de login
    window.location.href = "../html/login.html";
}
 


function logar(){


  // Obtém as informações do formulário
  var email = document.getElementById("email").value;
  var senha = document.getElementById("senha").value;


  // Verifica se o email e a senha foram preenchidos
  if (email === "" || senha === "") {
    alert("Por favor, preencha o email e a senha.");
    return;
  }


  // Obtém as informações armazenadas no localStorage
  var emailArmazenado = localStorage.getItem("email");
  var senhaArmazenada = localStorage.getItem("senha");


  // Verifica se as informações estão corretas
  if (email === emailArmazenado && senha === senhaArmazenada) {
    // Redireciona o usuário para a página inicial
    console.log("Conta acessada sucesso!");
    alert("Conta acessada sucesso!");
    window.location.href = "../html/telaDoDoutor.html";
  } else {
    // Exibe uma mensagem de erro
    alert("Email ou senha inválidos.");
  }
}


// function criarConta() {
   
//      var campos = ["nome", "telefone", "email", "senha", "confirmarSenha"];
     
//         for (var i = 0; i < campos.length; i++) {
//           var campo = document.getElementById(campos[i]).value;
//           if (campo === "") {
//             alert("Por favor, preencha todos os campos antes de criar a conta.");
//             return;
//           }
//         }
     
//         var senha = document.getElementById("senha").value;
//         var confirmarSenha = document.getElementById("confirmarSenha").value;
   
//         if (senha === "" || confirmarSenha === "") {
   
//             alert("Por favor, preencha os campos de senha antes de criar a conta.");
   
//         } else if (senha !== confirmarSenha) {


//             alert("As senhas informadas são diferentes. Por favor, verifique e tente novamente.");
//             document.getElementById("senha").value = "";
//             document.getElementById("confirmarSenha").value = "";
//             document.getElementById("senha").focus();
//             return;


//         } else {


//             // Armazena as informações no localStorage
//             localStorage.setItem("nome", nome);
//             localStorage.setItem("telefone", telefone);
//             localStorage.setItem("email", email);
//             localStorage.setItem("senha", senha);


//             // Código para criar a conta aqui
//             console.log("Conta criada com sucesso!");
//             alert("Conta criada com sucesso! Você será redirecionado para a página de login.");


//             // Limpa o formulário
//             // document.getElementById("nome").value = "";
//             // document.getElementById("telefone").value = "";
//             // document.getElementById("email").value = "";
//             // document.getElementById("senha").value = "";
//             // document.getElementById("confirmarSenha").value = "";


//             window.location.href = "../html/login.html";
           
//         }
// }
