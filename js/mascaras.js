//Função para formatar o campo de CPF de acordo com os caracteres apropriados.
function mascara_cpf(){
   //Obtém o elemento HTML do campo CPF e CPF de login
   var cpf = document.getElementById('cpf','cpfLogin')
   //Adiciona o ponto nos locais corretos do CPF
   if (cpf.value.length == 3 || cpf.value.length == 7){
       cpf.value += "."
     //Adiciona o hífen nos locais corretos do CPF  
   } else if(cpf.value.length == 11 ){ 
       cpf.value += "-"

   }
   //Obtém o elemento HTML do campo CPF de login 
   var cpf = document.getElementById('cpfLogin') 
   //Adiciona o ponto nos locais corretos do CPF de login
   if (cpf.value.length == 3 || cpf.value.length == 7){
       cpf.value += "."
    //Adiciona o hífen nos locais corretos do CPF de login
   }else if(cpf.value.length == 11 ){ 
       cpf.value += "-"

   }
}

//Função para formatar o campo de telefone de acordo com os caracteres apropriados.
function mascara_telefone(){
    //Obtém o elemento HTML do campo telefone
   var telefone = document.getElementById('telefone')
   //Adiciona parênteses no início do telefone
   if (telefone.value.length == 2){
       telefone.value = "(" + telefone.value;
       telefone.value += ")";
    //Adiciona hífen no local correto do telefone
   }else if(telefone.value.length == 9){
       telefone.value += "-";
   }
}