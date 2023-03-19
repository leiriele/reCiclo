<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>RECICLO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/jquery.skippr.css">
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/responsive.css" />
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>    
	<script type="text/javascript">
		// When the window has finished loading create our google map below
		google.maps.event.addDomListener(window, 'load', init);

		function init() {
			// Basic options for a simple Google Map
			// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
			var mapOptions = {
				// How zoomed in you want the map to start at (always required)
				zoom: 11,

				// The latitude and longitude to center the map (always required)
				center: new google.maps.LatLng(-19.912998, -43.940933), // Minas

				// How you would like to style the map. 
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{"featureType":"all","elementType":"all","stylers":[{"weight":"5.37"},{"gamma":"0.71"},{"lightness":"18"},{"saturation":"0"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#66bc41"},{"visibility":"on"}]}]
			};

			// Get the HTML DOM element that will contain your map 
			// We are using a div with id="map" seen below in the <body>
			var mapElement = document.getElementById('map');

			// Create the Google Map using our element and options defined above
			var map = new google.maps.Map(mapElement, mapOptions);

			// Let's also add a marker while we're at it
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(-19.912998, -43.940933),
				map: map,
				title: 'UAI!'
			});
		}
	</script>
	
</head>
<body>	
	<header>
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-12 col-sm-5 haeder-top-date">
						<p>Segunda, 20 Março 2023</p>
					</div>
					<div class="col-md-8 col-xs-12 col-sm-7">
						<div class="header-top-nav">
							<ul class="list-unstyled">
								<li><a href="formulario_cadastro.php">CADASTRO</a></li>
								<li><a href="login.php">LOGIN</a></li>
								<li><a href="page.html">BUSCA</a></li>
							</ul>
							<form action="" class="header-top-search">
								<input type="text" name="" />
								<button><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--Header Top Ends-->
		
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-3 logo">
						<a href="index.html"><img src="images/logo-1.png" alt="" /></a>
					</div>
					<div class="col-md-8 col-sm-9 menu-bar">
						<ul class="list-unstyled" id="menu">
							<li><a href="index.html" class="active">Inicio</a></li>
							<li><a href="page.html">Pontos de Coleta</a></li>
							<li><a href="page.html">Pedido de Coleta</a></li>
							<li><a href="page.html">Notícias</a></li>
							<li><a href="contact.html">Contato</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- Header Nav Ends -->
	</header><!-- Header Top Ends Here -->
	
	<section class="top-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-xs-12 col-md-12 slider-area">
					<div id="slider-container">
						<div id="theTarget">
							<div style="background:url(images/sld2.png);"></div>
							<div style="background:url(images/sld.png);"></div>
							<div style="background:url(images/sld1.png);"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-md-12 support-sidebar">
					<div class="support-sidebar-content">
						<div class="sidebar-heading">	
							<h2><i class="fa fa-map-marker"></i> Pontos de coleta</h2>
						</div>
						<div class="sidebar-details">
							<img src="images/maps2.jpg" alt="" />
							<p>Coloque o endereço na barra de busca</p>
							<form action="" class="header-top-search"> <input type="text" name="" /> <button><i class="fa fa-search"></i></button></form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- Top Contents Ends -->
	
	<section class="services">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-12 col-sm-6">
					<div class="single-service">
						<p><i class="fa fa-lightbulb-o" aria-hidden="true"></i></p>
						<h2>Boas Ideias</h2>
						<p>Donec fringilla eu est eu auctor.dolor varius arcu vitae malesuada Nulla eget bibendum. </p>
						<p><a href=""><i class="fa fa-angle-double-right"></i></a></p>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6">
					<div class="single-service">
						<p><i class="fa fa-pencil"></i></p>
						<h2>Projetos	</h2>
						<p>Donec fringilla eu est eu auctor.dolor varius arcu vitae malesuada Nulla eget b. </p>
						<p><a href=""><i class="fa fa-angle-double-right"></i></a></p>
					</div>
				</div>

				<div class="col-md-3 col-xs-12 col-sm-6">
					<div class="single-service">
						<p><i class="fa fa-calculator "></i></p>
						<h2>Calculadora Impacto</h2>
						<p>Donec fringilla eu est eu auctor.dolor varius arcu vitae </p>
						<p><a href=""><i class="fa fa-angle-double-right"></i></a></p>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6">
					<div class="single-service">
						<p><i class="fa fa-warning"></i></p>
						<h2>Denúncia</h2>
						<p>Donec fringilla eu est eu auctor.dolor varius arcu vitae malesuada Nulla eget bibendum. </p>
						<p><a href=""><i class="fa fa-angle-double-right"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</section><!-- Service Section Ends -->
	
	<section class="middle-content">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-xs-12 clients">
					<h2>Empresas Participantes</h2>
					<ul class="list-unstyled">
						<li><a href=""><img src="images/client02.png" alt="" /></a></li>
						<li><a href=""><img src="images/client01.png" alt="" /></a></li>
						<li><a href=""><img src="images/client03.png" alt="" /></a></li>
						<li><a href=""><img src="images/client04.png" alt="" /></a></li>
						<li><a href=""><img src="images/client05.png" alt="" /></a></li>
						<li><a href=""><img src="images/client06.png" alt="" /></a></li>
						<li><a href=""><img src="images/client07.png" alt="" /></a></li>
						<li><a href=""><img src="images/client08.png" alt="" /></a></li>
						<li><a href=""><img src="images/client09.png" alt="" /></a></li>
					</ul>
				</div>
				<div class="col-md-7 col-xs-12">
					<div class="mega-tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#about">Sobre</a></li>
							<li><a data-toggle="tab" href="#services">Serviços</a></li>
							<li><a data-toggle="tab" href="#work">Work</a></li>
							<li><a data-toggle="tab" href="#contact">Contatos</a></li>
						</ul>

						<div class="tab-content">
							<div id="about" class="tab-pane fade in active">
								<h3>Sobre nós</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis nisl, tristique vitae lobortis vel, elementum in odio. Aenean imperdiet vestibulum rhoncus. Phasellus sollicitudin ac ligula nec viverra. Vivamus auctor suscipit quam vel dictum. Vivamus convallis, eros quis volutpat vehicula, sem dolor rhoncus, tincidunt quam eget, fringilla odio.</p>
								<h3>How We Work</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis nisl, tristique vitae lobortis vel, elementum in odio. Aenean imperdiet vestibulum rhoncus. Phasellus sollicitudin ac ligula nec viverra. Vivamus auctor suscipit quam vel dictum. Vivamus convallis, eros quis volutpat vehicula, sem dolor rhoncus, tincidunt quam eget, fringilla odio.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque turpis nisl, tristique vitae lobortis vel, elementum in odio. Aenean imperdiet vestibulum rhoncus.</p>
							</div>
							<div id="services" class="tab-pane fade">
								<h3>Serviços</h3>
								<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
							<div id="work" class="tab-pane fade">
								<h3>Work</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
							</div>
							<div id="contact" class="tab-pane fade">
								<h3>Contatos</h3>
								<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- FORMULARIO CADASTRO -->
	<!--
	<section>
		<div class="container mt-4">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Detalhes Usuario
								<a href="student-create.php" class="btn btn-primary float-end">Cadastrar Usuario</a>
							</h4>
						</div>
						<div class="card-body">

							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Email</th>
										<th>CPF</th>
										<th>CNPJ</th>
										<th>Data de nascimento</th>
										<th>Senha</th>
										<th>Cidade</th>
										<th>Estado</th>  
										<th>Logradouro</th> 
										<th>Numero</th>
										<th>Bairro</th>
										<th>CEP</th>                        
									</tr>
								</thead>
								<tbody>
									<?php 
									$query = "SELECT * FROM usuarios";
									$query_run = mysqli_query($conexao, $query);

									if(mysqli_num_rows($query_run) > 0)
									{
										foreach($query_run as $usuarios)
										{
											?>
											<tr>
												<td><?= $usuario['id']; ?></td>
												<td><?= $usuario['name']; ?></td>
												<td><?= $usuario['email']; ?></td>
												<th><?= $usuario['CPF']; ?></th>
												<th><?= $usuario['CNPJ']; ?></th>
												<th><?= $usuario['dataNasc']; ?></th>
												<th><?= $usuario['senha']; ?></th>
												<th><?= $usuario['cidade']; ?></th>
												<th><?= $usuario['estado']; ?></th>
												<th><?= $usuario['logradouro']; ?></th>
												<th><?= $usuario['numeroR']; ?></th> 
												<th><?= $usuario['bairro']; ?></th> 
												<th><?= $usuario['cep']; ?></th>   
												<td>
													<a href="usuario-view.php?id=<?= $usuarios['id_usuarios']; ?>" class="btn btn-info btn-sm">Visualizar</a>
													<a href="usuario-edit.php?id=<?= $usuario['id_usuarios']; ?>" class="btn btn-success btn-sm"> Editar</a>
													<form action="code.php" method="POST" class="d-inline">
														<button type="submit" name="delete_usuarios" value="<?=$usuarios['id_usuarios'];?>" class="btn btn-danger btn-sm">Deletar</button>	
													</form>
												</td>
											</tr>
											<?php
										}
									}
									else
									{
										echo "<h5> Nenhum usuario cadastrado </h5>";
									}
									?>

								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	</section>
	-->
	<!-- Footer Starts -->
	<section class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12 testimonial footer-widget">
						<h2>Depoimento de clientes</h2>
						<p>tristique turpis. Vestibulum id faucibus ante, Mauris nec dolor venenatis, tristique turpis. Vestibulum id faucibus ante consequat leo a, tristique turpis. Vestibulum id faucibus ante.<br />
							<span>Joaquim, MG</span></p>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 footer-widget recent-posts">
							<h2>Notícias Recentes</h2>
							<ul class="list-unstyled">
								<li><a href=""><i class="fa fa-angle-double-right"></i> Lorem ipsum dolor sit amet?</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i> Consectetur adipiscing elit?</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i> Vivamus auctor suscipit quam vel dictum?</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i> Phasellus sollicitudin ac ligula nec viverra?</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i> Pellentesque turpis nisl?</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-6 col-xs-12 social-button footer-widget">
							<h2>Rede Social</h2>
							<ul class="list-unstyled">
								<li><a href=""><i class="fa fa-instagram"></i>Instagram</a></li>
								<li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
								<li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
								<li><a href=""><i class="fa fa-flickr"></i> Flickr</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 footer-widget subscribe">
							<h2>Receba notícias</h2>
							<p>Receba noticias diariamente sobre reciclagem</p>
							<form action="">
								<input type="text" name="" placeholder="Nome" />
								<input type="text" name="" placeholder="Email" />
								<input type="submit" class="pull-right" value="cadastrar" />
							</form>
						</div>
					</div>
				</div>
			</div><!-- Footer Top Ends -->

			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="footer-bottom-menu">
								<ul class="list-unstyled">
									<li><a href="index.html" class="active">Inicio</a></li>
									<li><a href="page.html">Pontos de Coleta</a></li>
									<li><a href="page.html">Pedido de Coleta</a></li>
									<li><a href="page.html">Notícias</a></li>
									<li><a href="contact.html">Contato</a></li>
								</ul>
							</div>
							<div class="copyright-text">
								<p>Copyright © 2016 Ecology Theme. All right reserved</p>
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
						</div>
					</div>
				</div>
			</div>

		</section>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.skippr.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#theTarget").skippr({
					transition: 'slide',
					speed: 1000,
					easing: 'easeOutQuart',
					navType: 'block',
					childrenElementType: 'div',
					arrows: false,
					autoPlay: false,
					autoPlayDuration: 5000,
					keyboardOnAlways: true,
					hidePrevious: false

				});
			});
		</script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script>
			$(function(){
				$('#menu').slicknav();
			});
		</script>
	</body>
	</html>