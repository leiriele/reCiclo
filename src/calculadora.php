<!-- Calculadora de Impacto = medida do impacto ambiental causado -->
<?php
include_once('verificar_sessao.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perfil Colaborador</title>
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
        <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Pedidos de coleta</span></a></li>
        <li><a href="pedido_coleta.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Solicitar coleta</span></a></li>
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
       <h2>Calculadora de impacto </h2>
       <ol>
        <li><a href="perfil_cliente.php">Inicio</a></li>
        <li><a href="index.php?logout=true">Sair</a></li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->
<body>
  <div>
    <p>Descubra o impacto ambiental dos materiais que você utiliza com nossa calculadora! Encontre maneiras de reduzir esses impactos e faça a diferença no cuidado com o meio ambiente. Pequenas ações podem ter um grande impacto!</p> 
  </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card">
          <div class="card-header bg-success text-white text-center">
            <h4>Calculadora de Impacto Ambiental</h4>
          </div>
          <div class="card-body">
           <form action="" method="post">
            <div class="form-group">
              <label for="plastico">Quantidade de plástico (em kg):</label>
              <input type="number" step="0.01" min="0" class="form-control" id="plastico" name="plastico" required>
            </div>

            <div class="form-group">
              <label for="vidro">Quantidade de vidro (em kg):</label>
              <input type="number" step="0.01" min="0" class="form-control" id="vidro" name="vidro" required>
            </div>

            <div class="form-group">
              <label for="metal">Quantidade de metal (em kg):</label>
              <input type="number" step="0.01" min="0" class="form-control" id="metal" name="metal" required>
            </div>

            <div class="form-group">
              <label for="metal">Quantidade de papel (em kg):</label>
              <input type="number" step="0.01" min="0" class="form-control" id="papel" name="papel" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success btn-block">Calcular</button>
            </div>

          </form>
        </div>


      </div>
    </div>
  </div>
</div>
</body>

<?php
//Impacto = (Quantidade de plástico x Energia necessária para produzir 1 kg de plástico x Fator de emissão de CO2 da energia utilizada x Tempo de decomposição do plástico no meio ambiente) / 1000

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $plastico = $_POST['plastico'];
  $metal = $_POST['metal'];
  $vidro = $_POST['vidro'];
  $papel = $_POST['papel'];

  $energiaPlastico = 50; 
  $fatorCO2Plastico = 3.14; 
  $tempoDecomposicaoPlastico = 450; 

  $energiaMetal = 200; 
  $fatorCO2Metal = 7.84; 
  $tempoDecomposicaoMetal = 500;

  $energiaVidro = 100; 
  $fatorCO2Vidro = 2.36; 
  $tempoDecomposicaoVidro = 4000;

  $energiaPapel = 10; 
  $fatorCO2Papel = 0.8; 
  $tempoDecomposicaoPapel = 2;

    //Calculo dos impactos
  $impactoPlastico = ($plastico * $energiaPlastico * $fatorCO2Plastico * $tempoDecomposicaoPlastico) / 1000;

  $impactoMetal = ($metal * $energiaMetal * $fatorCO2Metal * $tempoDecomposicaoMetal) / 1000;

  $impactoVidro = ($vidro * $energiaVidro * $fatorCO2Vidro * $tempoDecomposicaoVidro) / 1000;


  $impactoPapel = ($papel * $energiaPapel * $fatorCO2Papel * $tempoDecomposicaoPapel) / 1000;

// Resultados
  echo '<h3 style="text-align: center; color: darkgreen;">Impacto Ambiental:</h3>';
  echo '<ul style="text-align: center;">';
  echo '<li><span class="item-label">Impacto do plástico:</span> <span class="item-value">' . number_format($impactoPlastico, 2) . ' toneladas de CO2</span></li>';
  echo '<li><span class="item-label">Impacto do metal:</span> <span class="item-value">' . number_format($impactoMetal, 2) . ' toneladas de CO2</span></li>';
  echo '<li><span class="item-label">Impacto do vidro:</span> <span class="item-value">' . number_format($impactoVidro, 2) . ' toneladas de CO2</span></li>';
  echo '<li><span class="item-label">Impacto do papel:</span> <span class="item-value">' . number_format($impactoPapel, 2) . ' toneladas de CO2</span></li>';
  echo '</ul>';


}
?>
</main>

</html>