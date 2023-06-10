<?php
session_start();
include_once('conexao.php');

if (isset($_SESSION['idusuarios'])) {
  $idusuarios = $_SESSION['idusuarios'];

  $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE idusuarios = ?");
  $stmt->bind_param("i", $idusuarios);
  $stmt->execute();
  $result = $stmt->get_result();


if ($result->num_rows > 0) {
    $usuarios = $result->fetch_assoc();
    
    if ($usuarios !== null) {
        $idusuarios = $usuarios['idusuarios'];
        $name = $usuarios['name'];
        $email = $usuarios['email'];
        $cpf = $usuarios['cpf'];
        $dataNasc = $usuarios['dataNasc'];
        $cidade = $usuarios['cidade'];
        $estado = $usuarios['estado'];
        $logradouro = $usuarios['logradouro'];
        $numeroN = $usuarios['numeroN'];
        $bairro = $usuarios['bairro'];
        $cep = $usuarios['cep'];
    } else {
        echo "Dados do usuário não encontrados.";
        exit;
    }
} else {
    echo "Usuário não encontrado.";
    exit;
}
}
?>

<<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perfil Cliente</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style2.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_API&callback=initMap" async defer></script>


</head>

<body>
  <header>
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12 col-sm-5 haeder-top-date">

          </div>

          <div class="col-md-4 col-xs-12 col-sm-2 text-center">
            <a href="index.php"><img src="images/reCiclo-1.png" alt="" /></a>
          </div>
          <div class="col-md-4 col-xs-12 col-sm-5">
            <div class="header-top-nav">
              <ul class="list-unstyled">      
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">

    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light">
          <a href="index.html" value="<?php echo $usuarios['name']; ?>">
            <?php echo $usuarios['name']; ?>
          </a>
        </h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
       <ul>
        <li><a href="perfil_cliente.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Inicio</span></a></li>
        <li><a href="resume.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span> Pedidos de Coleta </span></a></li>
        <li><a href="pedido_coleta.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Solicitar coleta</span></a></li>
        <li><a href="pontos_coleta.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Pontos de coleta</span></a></li>
        <li><a href="calculadora.php" class="nav-link scrollto"><i class="bx bx-calculator"></i> <span>Calculadora Impacto</span></a></li>
        <li><a href="editar_perfil.php" class="nav-link scrollto"><i class="bx bx-cog"></i> <span>Configurações</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->

  <main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
       <h2>Pontos de coleta </h2>
       <ol>
        <li><a href="perfil_cliente.php">Inicio</a></li>
        <li><a href="index.php?logout=true">Sair</a></li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->


  <script>
    var collectionPoints = [
      { name: 'Ponto PAPEL', lat: -18.721930, lng: -47.524431, material: 'PAPEL' },
      { name: 'Ponto METAL', lat: -18.733951, lng: -47.489932, material: 'METAL' },
      { name: 'Ponto OLEO', lat: -18.725342, lng: -47.488847, material: 'ÓLEO' }
    ];

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: { lat: -18.727, lng: -47.500 }
      });

      var geocoder = new google.maps.Geocoder();

      var markers = [];

      function createMarkers() {
        collectionPoints.forEach(function (point) {
          var marker = new google.maps.Marker({
            position: { lat: point.lat, lng: point.lng },
            map: map,
            title: point.name,
            visible: false // inicialmente, todos os marcadores estão invisíveis
          });

          markers.push(marker);

          var infoWindow = new google.maps.InfoWindow();

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

      createMarkers();

      var filtroForm = document.getElementById('filtro-form');
      var filtroInput = document.getElementById('filtro');

      filtroForm.addEventListener('submit', function (event) {
        event.preventDefault();
        var material = filtroInput.value.toUpperCase();

        markers.forEach(function (marker) {
          var point = collectionPoints.find(function (point) {
            return point.name.includes(material) || point.material.toUpperCase() === material;
          });

          if (point && marker.title === point.name) {
            marker.setVisible(true);
          } else {
            marker.setVisible(false);
          }
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

<body onload="initMap()">
<div class="container">
  <div class="row">
    <div class="col">
      <form id="filtro-form" class="form-inline justify-content-center">
        <div class="form-group mb-2">
          <input type="text" id="filtro" class="form-control mr-2" placeholder="Informe o material...">
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </form>
    </div>
  </div>
</div>

  <br>
  <div id="map" style="height: 500px"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>