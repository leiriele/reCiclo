<? php
require 'conexao.php';
require_once('teste_login.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login reCiclo </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="login/css/style.css">
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
								<p>Ainda não possui uma conta?</p>
								<a href="cadastro_pt1.html" class="btn btn-white btn-outline-white">Inscrever-se</a>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Bem vindo</h3>
								</div>
							</div>
							<form action="teste_login.php" class="signin-form" method="POST">
								<div class="form-group mb-3">
									<label class="label" for="email">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Email" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="senha">Senha</label>
									<input type="password" name="senha" class="form-control" placeholder="Senha" required>
								</div>
								<div class="form-group">
									<button type="submit" name="submit" class="form-control btn btn-primary submit px-3" style="background: linear-gradient(45deg, #004225, #008000);">ENTRAR</button>
								</div>

								<div class="form-group d-md-flex">
									<div class="w-50 text-md-right">
										<a href="recuperar_senha.php">Esqueceu a senha</a>
									</div>
								</div>

								<div class="form-group d-md-flex">
									<div class="w-50 text-md-right">
										<a href="index.php">Sair</a>
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

