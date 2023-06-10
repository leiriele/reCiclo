	<?php
	session_start();
	require 'conexao.php';
	?>

	<!DOCTYPE HTML>
	<html lang="pt-BR">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>reCiclo</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="images/icn.ico">

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
		<script src="js/vendor/modal.js"></script>
	
		<script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE&callback=initMap" async defer></script>
		
		<script>
	    //PONTOS FIXOS
	  var collectionPoints = [
	    { name: 'Ponto PAPEL', lat: -18.721930, lng: -47.524431 },
	    {name: 'Ponto Plastico', lat: -18.719719, lng: -47.509543},
	    { name: 'Ponto METAL', lat: -18.733951, lng: -47.489932 },
	    { name: 'Ponto OLEO', lat: -18.725342, lng: -47.488847 }
	  ];

	  function initMap() {
	    var map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 12,
	      center: { lat: -18.727, lng: -47.500 }
	    });

	    var geocoder = new google.maps.Geocoder();

	    collectionPoints.forEach(function (point) {
	      var marker = new google.maps.Marker({
	        position: { lat: point.lat, lng: point.lng },
	        map: map,
	        title: point.name
	      });

	      var infoWindow = new google.maps.InfoWindow();
	      //caixinha em cima do ponto
	      geocoder.geocode({ 'location': { lat: point.lat, lng: point.lng } }, function (results, status) {
	        if (status === 'OK') {
	          if (results[0]) {
	            var addressComponents = results[0].address_components;
	            var streetName = getAddressComponent(addressComponents, 'route');
	            var neighborhood = getAddressComponent(addressComponents, 'sublocality');
	            var postalCode = getAddressComponent(addressComponents, 'postal_code');
	            var content = '<strong>' + point.name + '</strong><br>' + streetName + ', ' + neighborhood + '<br>CEP: ' + postalCode + '<br><a href="#" onclick="openMap(' + point.lat + ', ' + point.lng + ');">Visualizar no mapa</a>';
	            infoWindow.setContent(content);
	          }
	        }

	        marker.addListener('click', function () {
	          infoWindow.open(map, marker);
	        });
	      });
	    });
	  }

	  function getAddressComponent(addressComponents, type) {
	    for (var i = 0; i < addressComponents.length; i++) {
	      var component = addressComponents[i];
	      var componentTypes = component.types;
	      if (componentTypes.indexOf(type) !== -1) {
	        return component.long_name;
	      }
	    }
	    return '';
	  }

	  function openMap(lat, lng) {
	    var url = 'https://www.google.com/maps/search/?api=1&query=' + lat + ',' + lng;
	    window.open(url, '_blank');
	  }
	</script>
		
	</head>
	<body>	
	<header>
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-5 haeder-top-date">
					<?php setlocale(LC_TIME, 'pt_BR.utf8'); ?>
					<?php echo strftime('%e de %B, %Y'); ?>
				</div>

				<div class="col-md-4 col-xs-12 col-sm-2 text-center">
					<a href="index.php"><img src="images/reCiclo-1.png" alt="" /></a>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-5">
					<div class="header-top-nav">
						<ul class="list-unstyled">
							<li><a href="cadastro_pt1.html">CADASTRO</a></li>
							<li><a href="login.php" id="myBtn">LOGIN</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--Header Top Ends-->
	
			<div class="header-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-3 logo"></div>
						<div class="col-md-8 col-sm-9 menu-bar">
							<ul class="list-unstyled" id="menu">
								<li><a href="index.php" class="active">Inicio</a></li>
								<li><a href="consultaTotal.php">Pedido de Coleta</a></li>
								<li><a href="page.html">Notícias</a></li>
								<li><a href="contact.html">Contato</a></li>
							</ul>
						</div>
							<h2>Bem-vindo ao Reciclo</h2>
					</div>
						<div class="row">
							<p>Faça parte do time dos eco-warriors! Recicle, reutilize e arrase na preservação do meio ambiente. Vamos transformar o mundo em um lugar mais verde e cheio de atitude!.</p>	
						</div>
				</div>
			</div>
		</header><!-- Header Top Ends Here -->
	<!--Top Content Ends Here-->
		<!-- Mapa -->
		<section>
		    <div class="container">
		        <div class="row">
		            <div class="col">
		                <div class="map-container">
		                 <div id="map"></div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
		<br><br>

<!-- Footer Starts -->
	<section class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12 testimonial footer-widget">
						<h2>Depoimento de clientes</h2>
						<p>"Estou impressionado com a página reCiclo! É incrível como ela facilita todo o processo de descarte correto e consciente. Agora consigo encontrar facilmente os pontos de coleta próximos a mim e contribuir para um ambiente mais sustentável."<br />
						<span>Jefferson Dias, MG</span></p>
					</div>
					
			<div class="col-md-4 col-sm-6 col-xs-12 footer-widget recent-posts">
				<h2>Notícias Recentes</h2>
				<ul class="list-unstyled">
					<li><a href="noticia1.html"><i class="fa fa-angle-double-right"></i> Novas tecnologias na reciclagem de plásticos</a></li>
					<li><a href="noticia2.html"><i class="fa fa-angle-double-right"></i> Como a coleta seletiva contribui para a preservação do meio ambiente</a></li>
					<li><a href="noticia3.html"><i class="fa fa-angle-double-right"></i> Iniciativas de reciclagem em empresas ganham destaque</a></li>
					<li><a href="noticia4.html"><i class="fa fa-angle-double-right"></i> O papel do consumidor na cadeia de reciclagem</a></li>
				</ul>
			</div>
					<div class="col-md-2 col-sm-6 col-xs-12 social-button footer-widget">
						<h2>Rede Social</h2>
						<ul class="list-unstyled">
							<li><a href=""><i class="fa fa-instagram"></i>Instagram</a></li>
							<li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
							<li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 footer-widget subscribe">
						<h2>Receba notícias</h2>
						<p>Fique por dentro das novidades eco-friendly e receba dicas sustentáveis diretamente na sua caixa de entrada. Junte-se a nós e vamos construir um futuro mais verde juntos!</p>
						<form action="">
							<input type="text" name="" placeholder="Name" />
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