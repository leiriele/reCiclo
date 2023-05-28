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

  <title>Perfil Coletor</title>
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
          <h2>PERFIL COLABORADOR</h2>
          <ol>
            <li><a href="index.php">Inicio</a></li>
            <li>Usuario</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card">
          <div class="card-header bg-success text-white text-center">
            <h4>Pedido coleta</h4>
          </div>
          <div class="card-body">
       <form action="cadastro_pedido.php" method="POST">
        <input type="hidden" name="idusuarios" value="<?php echo $idusuarios; ?>">
        <div class="mb-3">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $name; ?>" required>
              </div>
  <div class="mb-3">
    <label for="endereco" class="form-label">Endereço de Coleta</label>
    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $logradouro . ' nº ' . $numeroN . ', bairro ' . $bairro; ?>" required>
  </div>
<div class="mb-3">
  <label for="produto" class="form-label">Produto</label>
  <select class="form-control" id="produto" name="produto" required>
    <option value="papel">Papel</option>
    <option value="metal">Metal</option>
    <option value="vidro">Vidro</option>
    <option value="plastico">Plástico</option>
  </select>
</div>

  <div class="mb-3">
    <label for="quantidade" class="form-label">Quantidade(aprox. kg)</label>
    <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required>
  </div>
  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="telefone" class="form-label">Telefone/Whatsapp</label>
    <input type="tel" class="form-control" id="telefone" name="telefone" required>
  </div>
    <div class="mb-3">
    <label for="midia" class="form-label">Midia</label>
    <input type="file" class="form-control" id="midia" name="midia">
  </div>

  <div class="mb-3">
          <input type="submit" name="submit" id="submit" formaction="cadastro_pedido.php">
          <button class="btn"><a href="index.php" style="color: green;">Cancelar</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
</main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/mainPerfil.js"></script>

</body>

</html>