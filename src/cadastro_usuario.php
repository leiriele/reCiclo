<? php
require 'conexao.php';
require_once('teste_login.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cadastro reCiclo </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="login/css/style.css">
	<script src="js/vendor/funcoes.js"></script>
</head>

<body>
	<section class="ftco-section">
		<div class="container" >
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10" >
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last" style="background: linear-gradient(45deg, #004225, #008000);">
							<div class="text w-100" >
								<h1 ><img src="images/reCiclo-1.png" alt="" /><span></span></h1>
								<p>Já possui uma conta?</p>
								<a href="login.php" class="btn btn-white btn-outline-white">Entrar</a>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Cadastro</h3>
								</div>
							</div>
							<form id="formularioCadastro" action="cadastro_form.php" method="POST">
								<fieldset>
									<div class="form-group mb-3">
										<label for="name" class="label">Nome Completo</label>
										<input type="text" name="name" id="name" class="form-control" required>     
									</div>

									<div class="form-group mb-3">
										<label for="email" class="label">Email</label>
										<input type="email" name="email" id="email" class="form-control" required>         
									</div>
									<div class="form-group mb-3">
										<label for="senha" class="label">Senha</label>
										<input type="password" name="senha" id="senha" class="form-control" required>
									</div>

									<div class="form-group mb-3">
										<label for="cpf" class="label">CPF</label>
										<input type="text" name="cpf" id="cpf" class="form-control" required onblur="validacao(this.value)">
									</div>

									<div class="form-group mb-3">
										<label for="dataNasc"><b>Data de Nascimento:</b></label>
										<input type="date" name="dataNasc" id="dataNasc" required>
									</div>

									<h4>Endereço</h4>
									<div class="form-group mb-3">
										<label for="cidade" class="label">Cidade</label>
										<input type="text" name="cidade" id="cidade" class="form-control" required>
									</div>    
									
									<div class="form-group mb-3">            
										<label for="estado" class="label"><b>Estado</b></label>
										<br><br>
										<select id="estado" name="estado" class="form-control" required>
											<option selected>Escolher...</option>
											<option>AC</option>
											<option>AL</option>
											<option>AP</option>
											<option>AM</option>
											<option>BA</option>
											<option>CE</option>
											<option>DF</option>
											<option>ES</option>
											<option>GO</option>
											<option>MA</option>
											<option>MT</option>
											<option>MS</option>
											<option>MG</option>
											<option>PA</option>
											<option>PB</option>
											<option>PR</option>
											<option>PE</option>
											<option>PI</option>
											<option>RJ</option>
											<option>RN</option>
											<option>RS</option>
											<option>RO</option>
											<option>RR</option>
											<option>SC</option>
											<option>SP</option>
											<option>SE</option>
											<option>TO</option>
										</select>
									</div>
									<br>
									<div class="form-group mb-3">
										<label for="logradouro" class="label"><b>Logradouro</b></label>
										<input type="text" name="logradouro" id="logradouro" class="form-control" required> 
									</div>
									<br>
									<div class="form-group mb-3"> 
										<label for="numeroN" class="label" style="display: inline-block;"><b>Numero</b></label>                 
										<input type="number" name="numeroN" id="numeroN" class="form-control" required>   
									</div>
									<div class="form-group mb-3">    
										<label for="bairro" class="label" style="display: inline-block;"><b>Bairro</b></label>               
										<input type="text" name="bairro" id="bairro" class="form-control" required>  
									</div>
									<div class="form-group mb-3">    
										<label for="cep" class="label"><b>CEP</b></label>        
										<input type="text" name="cep" id="cep" class="form-control" required>
									</div>
									<div class="form-group">
										<button type="submit" name="submit1" id="submit1" formaction="cadastro_form.php" class="form-control btn btn-primary submit px-3" style="background: linear-gradient(45deg, #004225, #008000);">Cadastrar</button>
									</div>

									<div class="form-group d-md-flex">
										<div class="w-50 text-md-right">
											<a href="login.php">Sair</a>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
	</html>

