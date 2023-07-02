function mascaraCPF(cpfInput) {
  // Remove caracteres não numéricos
  cpfInput.value = cpfInput.value.replace(/\D/g, '');

  // Limita o comprimento máximo do CPF e remove dígitos adicionais
  if (cpfInput.value.length > 11) {
    cpfInput.value = cpfInput.value.slice(0, 11);
  }

  // Aplica a máscara de acordo com o comprimento
  const length = cpfInput.value.length;
  if (length === 11) {
    cpfInput.value = cpfInput.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
  }
}   
  
function mascaraTelefone(telefoneInput) {
  // Remove caracteres não numéricos
  telefoneInput.value = telefoneInput.value.replace(/\D/g, '');

  // Aplica a máscara de acordo com o comprimento
  if (telefoneInput.value.length > 11) {
      // Limita o comprimento máximo do telefone
      telefoneInput.value = telefoneInput.value.slice(0, 11);
  }
  // Verifica o comprimento atual do telefone
  const length = telefoneInput.value.length;
  if (length === 11) {
    telefoneInput.value = telefoneInput.value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
  } else if (length === 10) {
    telefoneInput.value = telefoneInput.value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
  }
}