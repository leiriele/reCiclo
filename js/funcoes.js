function verificar1()
{	
	var nome = document.forms["cad"]["nome"].value;
	var cpf = document.forms["cad"]["cpf"].value;
	var x = document.forms["cad"]["emailCad"].value;
	var dataNasc = document.forms["cad"]["dataNasc"].value;
	var senha = document.forms["cad"]["senhaCad"].value;
    
	var cont = 0;
	var cont2 = 0;

	var spacepos = nome.indexOf(" ");
	var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");

	for (var i = 0; i < nome.length; i++) 
	{
		if(nome[i] == " ")
		{
			cont = cont + 1;
		}
	}
	for (var i = 0; i < cpf.length; i++) 
	{
		if(cpf[i] == '1' || cpf[i] == '2' || cpf[i] == '3' || cpf[i] == '4' || cpf[i] == '5' || cpf[i] == '6' || cpf[i] == '7' 
		|| cpf[i] == '8' || cpf[i] == '9' || cpf[i] == '0')
		{
			cont2 = cont2 + 1;
		}
	}

	var objData = new Date(dataNasc);

	//Verificando nome
	if (cont < 1 || spacepos < 1)
	{
		psychoAlert("Informe o nome completo.");
		return false;
	}
	//email
	else if(x == "" || atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
	{
		   psychoAlert("O e-mail possui dados incorretos.Por favor, verifique.");
		   return false;
	}
	//senha
	else if (senha.length < 8)
	{
		psychoAlert("A senha deve ter, no mínimo, 8 caracteres.");
		return false;
	}
	//data de nascimento
	else if (isNaN(objData.getTime()) || objData.getYear() > 121)
	{
		psychoAlert("Data de nascimento incorreta. Por favor, verifique!");
	   	return false;
	}
	//e o CPF
	else if (cont2 != 11) 
	{
		psychoAlert("O CPF possui dados incorretos.Por favor, verifique.");
		return false;
	}

	//Tornando o bloco 2 de cadastro visível
	document.getElementById('bloco-1').style.display = 'none';
	document.getElementById('bloco-2').style.display = 'block';
	document.getElementById('proximo').innerHTML = 'Concluir<i class="ml-2 fas fa-check"></i>';
	document.getElementById('proximo').setAttribute('onclick','verificar2()')
}
function verificar2()
{	
	var cep = document.forms["cad"]["cep"].value;
	var cont2 = 0;

	for (var i = 0; i < cep.length; i++) 
	{
		if(cep[i] == '1' || cep[i] == '2' || cep[i] == '3' || cep[i] == '4' || cep[i] == '5' || cep[i] == '6' || cep[i] == '7' 
		|| cep[i] == '8' || cep[i] == '9' || cep[i] == '0')
		{
			cont2 = cont2 + 1;
		}
	}

	if (document.forms["cad"]["rua"].value == "" ||
		document.forms["cad"]["numero"].value == "" ||
		document.forms["cad"]["bairro"].value == "" ||
		document.forms["cad"]["cidade"].value == "" ||
		document.forms["cad"]["estado"].value == " ") {
			
		psychoAlert("Existe(m) campo(s) obrigatório(s) em branco. Por favor, preencha-o(s).");
		return false;
	}
	else if (cont2 != 8)
	{
		psychoAlert("Insira um CEP válido!");
		return false;
	}
	
	concluir();	
}
function verificar3()
{	
	//var propriedades = document.forms["cad"]["propriedades"].value;
	var nmr_Prop = $('#nmr_Prop').val();
	
	if(!$('#switchPropriedade').is(':checked'))
	{
		$('#concluir').trigger('click');
	}
	else if ($('#switchPropriedade').is(':checked') && (nmr_Prop == "" ||  parseInt(nmr_Prop) < 1)) 
	{
		psychoAlert("Por favor, informe a quantidade de propriedades do usuário.");
		return false;
	}
	else
	{
		proximo3();
	}
}
function formatar(mascara, documento)
{
	  var i = documento.value.length;
	  var saida = mascara.substring(0,1);
	  var texto = mascara.substring(i)
	  
	  if (texto.substring(0,1) != saida)
	  {
	            documento.value += texto.substring(0,1);
	  }
  
}
function proximo()
{
	var display = document.getElementById("cadastro-1").style.display;
        if(display == "none"){
            document.getElementById("cadastro-1").style.display = 'block';
        	document.getElementById("cadastro-2").style.display = 'none';
        	document.getElementById("cad1").style.display = 'block';
        	document.getElementById("cad2").style.display = 'none';
        	$('#cadastro-1').addClass('flipOutX');
        	$('#cad1').addClass('flipOutX');
        	$('#cadastro-2').addClass('flipInX');
        	$('#cad2').addClass('flipInX');
        	document.getElementById("voltar1").style.display = 'none';
        }
        else{
            document.getElementById("cadastro-1").style.display = 'none';
        	document.getElementById("cadastro-2").style.display = 'block';
        	document.getElementById("cad1").style.display = 'none';
        	document.getElementById("cad2").style.display = 'inline';
        	document.getElementById("voltar1").style.display = 'inline';

        }
}	
function psychoAlert(t)
{
	Swal.fire({
	  title: "Corrija para prosseguir",
	  text: t,
	  icon: "error",
	  confirmButtonColor: '#26547c',
	  confirmButtonText: 'Corrigir'
	});
};
