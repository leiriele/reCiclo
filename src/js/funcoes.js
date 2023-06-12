function validaCPF(cpf) {

    if(cpf.length != 11) {
        return false;
    } else {

        var numeros = cpf.substring(0,9);   // pega os 9 primeiro dígitos
        var digitos = cpf.substring(9);   // pega apenas a partir do 9 digito
        
        var soma = 0;
        for( var i = 10; i > 1; i--) {
            soma += numeros.charAt(10 - i) * i;
        }

        var resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);

        // Validação primeiro digito
        if(resultado != digitos.charAt(0)) {
            return false;
        }

        soma = 0;
        numeros = cpf.substring(0, 10);

        for(var k = 11; k > 1; k--) {
            soma += numeros.charAt(11-k) * k;
        }

        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);

        // Validação segundo digito
        if(resultado != digitos.charAt(1)) {
            return false;
        }
        
        return true;
    }
}

function validacao(cpf) {
    console.log('Iniciando a validação do CPF...');
    
    var cpfInput = document.getElementById('cpf');
    var successMessage = document.getElementById('success');
    var errorMessage = document.getElementById('error');
    
    successMessage.style.display = 'none';
    errorMessage.style.display = 'none';

    var resultadoValidacao = validaCPF(cpf);

    if (resultadoValidacao) {
        successMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'block';
        cpfInput.value = '';
        cpfInput.focus();
        setTimeout(function() {
            errorMessage.style.display = 'none';
        }, 5000);
    }
}
