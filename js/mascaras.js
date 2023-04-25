function mascara_cpf(){
    /*  Função para formatar o campo de CPF de acordo com os caracteres apropriados.*/
   var cpf = document.getElementById('cpf','cpfLogin')
   if (cpf.value.length == 3 || cpf.value.length == 7){
       cpf.value += "."
   }else if(cpf.value.length == 11 ){
       cpf.value += "-"

   }

   var cpf = document.getElementById('cpfLogin')
   if (cpf.value.length == 3 || cpf.value.length == 7){
       cpf.value += "."
   }else if(cpf.value.length == 11 ){
       cpf.value += "-"

   }
}

function mascara_telefone(){
   /*  Função para formatar o campo de telefone de acordo com os caracteres apropriados.*/
   var telefone = document.getElementById('telefone')
   if (telefone.value.length == 2){
       telefone.value = "(" + telefone.value;
       telefone.value += ")";
   }else if(telefone.value.length == 9){
       telefone.value += "-";
   }
}