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
          <h2>PERFIL CLIENTE</h2>
          <ol>
            <li><a href="index.php">Inicio</a></li>
            <li>Colaborador</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<body>
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

      <button type="submit" class="btn btn-success btn-block">Calcular</button>
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
    // Obtém as quantidades de plástico, metal e vidro
    $plastico = $_POST['plastico'];
    $metal = $_POST['metal'];
    $vidro = $_POST['vidro'];
    $papel = $_POST['papel'];


    // Define os valores necessários para o cálculo do impacto do plástico
    $energiaPlastico = 50; // Energia necessária para produzir 1 kg de plástico (em MJ)
    $fatorCO2Plastico = 3.14; // Fator de emissão de CO2 da energia utilizada para produzir 1 kg de plástico
    $tempoDecomposicaoPlastico = 450; // Tempo de decomposição do plástico no meio ambiente (em anos)

    // Define os valores necessários para o cálculo do impacto do metal
    $energiaMetal = 200; // Energia necessária para produzir 1 kg de metal (em MJ)
    $fatorCO2Metal = 7.84; // Fator de emissão de CO2 da energia utilizada para produzir 1 kg de metal
    $tempoDecomposicaoMetal = 500; // Tempo de decomposição do metal no meio ambiente (em anos)

    // Define os valores necessários para o cálculo do impacto do vidro
    $energiaVidro = 100; // Energia necessária para produzir 1 kg de vidro (em MJ)
    $fatorCO2Vidro = 2.36; // Fator de emissão de CO2 da energia utilizada para produzir 1 kg de vidro
    $tempoDecomposicaoVidro = 4000; // Tempo de decomposição do vidro no meio ambiente (em anos)

    // Define os valores necessários para o cálculo do impacto do papel
    $energiaPapel = 10; // Energia necessária para produzir 1 kg de papel (em kWh)
    $fatorCO2Papel = 0.8; // Fator de emissão de CO2 da energia utilizada para produzir 1 kg de papel
    $tempoDecomposicaoPapel = 2; // Tempo de decomposição do papel no meio ambiente (em anos)
    // Quantidade de papel em kg





    // Calcula o impacto do plástico
    $impactoPlastico = ($plastico * $energiaPlastico * $fatorCO2Plastico * $tempoDecomposicaoPlastico) / 1000;

    // Calcula o impacto do metal
    $impactoMetal = ($metal * $energiaMetal * $fatorCO2Metal * $tempoDecomposicaoMetal) / 1000;

    // Calcula o impacto do vidro
    $impactoVidro = ($vidro * $energiaVidro * $fatorCO2Vidro * $tempoDecomposicaoVidro) / 1000;

    // Cálculo do impacto do papel
    $impactoPapel = ($papel * $energiaPapel * $fatorCO2Papel * $tempoDecomposicaoPapel) / 1000;

   // Exibe os resultados
    echo "<h3>Impacto Ambiental:</h3>";
    echo "<ul>";
    echo "<li>Impacto do plástico: " . number_format($impactoPlastico, 2) . " toneladas de CO2</li>";
    echo "<li>Impacto do metal: " . number_format($impactoMetal, 2) . " toneladas de CO2</li>";
    echo "<li>Impacto do vidro: " . number_format($impactoVidro, 2) . " toneladas de CO2</li>";
    echo "<li>Impacto do papel: " . number_format($impactoPapel, 2) . "toneladas de CO2 </li>";
     echo "</ul>";

    }
?>
</main>
</html>