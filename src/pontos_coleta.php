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

  <script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_GOOGLEMAPS"></script>


</head>

<body>

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
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
      <nav id="navbar" class="nav-menu navbar">
       <ul>
          <li><a href="perfil_cliente.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Inicio</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="pedido_coleta.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Pedido de coleta</span></a></li>
          <li><a href="pontos_coleta.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Ponto de coleta</span></a></li>
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
          <h2>PERFIL COLABORADOR</h2>
          <ol>
            <li><a href="index.php">Inicio</a></li>
            <li>Colaborador</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


  <script>
    // Pontos de coleta seletiva
    var collectionPoints = [
      { name: 'Ponto 1', lat: -18.721930, lng: -47.524431 },
      { name: 'Ponto 2', lat: -18.733951334455863, lng: -47.489932191190164 },
      { name: 'Ponto 3', lat: -18.725341763697696, lng: -47.48884652002579 }
    ];

    function geocodeAddress(geocoder, resultsMap) {
      var address = document.getElementById('address').value;
      geocoder.geocode({ 'address': address }, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });
          document.getElementById('latitude').value = results[0].geometry.location.lat();
          document.getElementById('longitude').value = results[0].geometry.location.lng();
        } else {
          alert('Não foi possível encontrar o endereço informado. Por favor, verifique se o endereço está correto e tente novamente.');
        }
      });

      // Marcadores de coleta seletiva
      collectionPoints.forEach(function(point) {
        var marker = new google.maps.Marker({
          position: { lat: point.lat, lng: point.lng },
          map: resultsMap,
          title: point.name
        });
      });
    }

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: { lat: -18.734993458630225, lng: -47.49922438379786} 
      });

      var geocoder = new google.maps.Geocoder();

      document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
      });
    }
  </script>
</head>

<body onload="initMap()">
  <title>Localizador de endereço</title>
  <div>
    <input type="text" id="address" placeholder="Digite o endereço...">
    <button id="submit">Localizar</button>
  </div>
  ´<br>
  <div id="map" style="height: 800px"></div>
</body>
</html>