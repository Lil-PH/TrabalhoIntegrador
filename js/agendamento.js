function mascara_cpf(){
     /*  Função para formatar o campo de CPF de acordo com os caracteres apropriados.*/
    var cpf = document.getElementById('cpf')
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

const form = document.getElementById('agendando');
const nomeInput = document.getElementById('nome');
const cpfInput = document.getElementById('cpf');
const emailInput = document.getElementById('email');
const telefoneInput = document.getElementById('telefone');
const doutorInput = document.getElementById('doutor');
const procedimentoInput = document.getElementById('procedimento');
const dataInput = document.getElementById('data');
const horaInput = document.getElementById('hora');

form.addEventListener('submit', function(event) {
    event.preventDefault(); // impede o envio padrão do formulário

    // obtém os valores selecionados pelo usuário
    const nome = nomeInput.value;
    const cpf = cpfInput.value;
    const email = emailInput.value;
    const telefone = telefoneInput.value;
    const doutor = doutorInput.value;
    const procedimento = procedimentoInput.value;
    const data = dataInput.value;
    const hora = horaInput.value;

    // cria um objeto com os valores do agendamento
    const agendamento = {

        nome,
        cpf,
        email,
        telefone,
        doutor,
        procedimento,
        data,
        hora
    };

    // salva o agendamento no localStorage
    localStorage.setItem('agendamento', JSON.stringify(agendamento));

    alert('Agendamento salvo com sucesso!');


});