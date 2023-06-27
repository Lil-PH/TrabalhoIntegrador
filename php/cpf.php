<?php

	// MUDAR NOME DO ARQUIVO PARA validarCpf.php

    function validarCPF($cpf) {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF possui 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais (ex: 111.111.111-11)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += ($cpf[$i] * (10 - $i));
        }
        $resto = $soma % 11;
        $dv1 = ($resto < 2) ? 0 : (11 - $resto);

        // Calcula o segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += ($cpf[$i] * (11 - $i));
        }
        $resto = $soma % 11;
        $dv2 = ($resto < 2) ? 0 : (11 - $resto);

        // Verifica se os dígitos verificadores estão corretos
        if ($cpf[9] != $dv1 || $cpf[10] != $dv2) {
            return false;
        }

        return true;
    }

?>