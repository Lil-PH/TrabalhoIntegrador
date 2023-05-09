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