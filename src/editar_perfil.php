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
<html lang="pt-BR">

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
           <h2>Atualizar cadastro</h2>
          <ol>
            <li><a href="perfil_cliente.php">Inicio</a></li>
           <li><a href="index.php?logout=true">Sair</a></li>
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
            <h4>Atualizar Dados</h4>
          </div>
          <div class="card-body">
            <?php
            if(isset($_SESSION['mensagem'])) {
              echo $_SESSION['mensagem'];
              unset($_SESSION['mensagem']);
            }
            ?>
            <form action="editar_usuario.php" method="POST">

              <input type="hidden" name="idusuarios" value="<?php echo $idusuarios; ?>">
              <div class="form-group">
                <label for="name">Nome Completo</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" required>
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $usuarios['email']; ?>" required>
              </div>
              <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $usuarios['cpf']; ?>" required>
              </div>
              <div class="form-group">
                <label for="dataNasc">Data de Nascimento</label>
                <input type="date" name="dataNasc" id="dataNasc" class="form-control" value="<?php echo $usuarios['dataNasc']; ?>" required>
              </div>
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $usuarios['cidade']; ?>" required>
              </div>
              <div class="form-group">
    <label for="estado">Estado</label>
    <select id="estado" name="estado" class="form-control" required>
        <option selected>Escolher...</option>
        <option <?php echo ($usuarios['estado'] == 'AC') ? 'selected' : ''; ?>>AC</option>
        <option <?php echo ($usuarios['estado'] == 'AL') ? 'selected' : ''; ?>>AL</option>
        <option <?php echo ($usuarios['estado'] == 'AP') ? 'selected' : ''; ?>>AP</option>
        <option <?php echo ($usuarios['estado'] == 'AM') ? 'selected' : ''; ?>>AM</option>
        <option <?php echo ($usuarios['estado'] == 'BA') ? 'selected' : ''; ?>>BA</option>
        <option <?php echo ($usuarios['estado'] == 'CE') ? 'selected' : ''; ?>>CE</option>
        <option <?php echo ($usuarios['estado'] == 'DF') ? 'selected' : ''; ?>>DF</option>
        <option <?php echo ($usuarios['estado'] == 'ES') ? 'selected' : ''; ?>>ES</option>
        <option <?php echo ($usuarios['estado'] == 'GO') ? 'selected' : ''; ?>>GO</option>
        <option <?php echo ($usuarios['estado'] == 'MA') ? 'selected' : ''; ?>>MA</option>
        <option <?php echo ($usuarios['estado'] == 'MT') ? 'selected' : ''; ?>>MT</option>
        <option <?php echo ($usuarios['estado'] == 'MS') ? 'selected' : ''; ?>>MS</option>
        <option <?php echo ($usuarios['estado'] == 'MG') ? 'selected' : ''; ?>>MG</option>
        <option <?php echo ($usuarios['estado'] == 'PA') ? 'selected' : ''; ?>>PA</option>
        <option <?php echo ($usuarios['estado'] == 'PB') ? 'selected' : ''; ?>>PB</option>
        <option <?php echo ($usuarios['estado'] == 'PR') ? 'selected' : ''; ?>>PR</option>
        <option <?php echo ($usuarios['estado'] == 'PE') ? 'selected' : ''; ?>>PE</option>
        <option <?php echo ($usuarios['estado'] == 'PI') ? 'selected' : ''; ?>>PI</option>
        <option <?php echo ($usuarios['estado'] == 'RJ') ? 'selected' : ''; ?>>RJ</option>
        <option <?php echo ($usuarios['estado'] == 'RN') ? 'selected' : ''; ?>>RN</option>
        <option <?php echo ($usuarios['estado'] == 'RS') ? 'selected' : ''; ?>>RS</option>
        <option <?php echo ($usuarios['estado'] == 'RO') ? 'selected' : ''; ?>>RO</option>
        <option <?php echo ($usuarios['estado'] == 'RR') ? 'selected' : ''; ?>>RR</option>
        <option <?php echo ($usuarios['estado'] == 'SC') ? 'selected' : ''; ?>>SC</option>
        <option <?php echo ($usuarios['estado'] == 'SP') ? 'selected' : ''; ?>>SP</option>
        <option <?php echo ($usuarios['estado'] == 'SE') ? 'selected' : ''; ?>>SE</option>
        <option <?php echo ($usuarios['estado'] == 'TO') ? 'selected' : ''; ?>>TO</option>
    </select>
</div>

              <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?php echo $usuarios['logradouro']; ?>" required>
              </div>
              <div class="form-group">
                <label for="numeroR">Número</label>
                <input type="number" name="numeroN" id="numeroN" class="form-control" value="<?php echo $usuarios['numeroN']; ?>" required>
              </div>
              <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo $usuarios['bairro']; ?>" required>
              </div>
              <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control" value="<?php echo $usuarios['cep']; ?>" required>
              </div>

              <input type="submit" name="submit" id="submit" formaction="editar_usuario.php?idusuarios=<?php echo $usuarios['idusuarios']; ?>" value="Atualizar">

              <button class="btn"><a href="perfil_cliente.php" style="color: green;">Cancelar</a></button>

              <br><br>
              <button type="button" onclick="confirmarDeletar()">Deletar Conta</button>

</main>
</body>
<script>

function confirmarDeletar() {
  if (confirm("Tem certeza que deseja deletar este usuário?")) {
    window.location.href = "delete_usuario.php?idusuarios=<?php echo $idusuarios ?>";
  }
}
</script>
</html>
