<!--//RESUMO DOS PEDIDOS DO PROPRIO USUARIO exibidos apos login na aba "Pedidos Coleta" -->
<?php
include_once('verificar_sessao.php');
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

  <!-- ======= Header USUARIO ======= -->
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
       <h2>Bem vindo<span>,</span> <?php echo $usuarios['name'];?>!</h2>
       <ol>
        <li><a href="perfil_cliente.php">Inicio</a></li>
        <li><a href="index.php?logout=true">Sair</a></li>
      </ol>
    </div>
  </div>

</section><!-- End Breadcrumbs -->
<div>
  <p>Bem-vindo ao seu incrível perfil! Aqui, você tem acesso exclusivo aos pedidos de coleta que você fez. Prepare-se para mergulhar em uma aventura de reciclagem e salvar o mundo!</p>
</div>
<section>

  <h2>Meus Pedidos</h2>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Endereço</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Descrição</th>
        <th>Telefone</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = null; 

      if (isset($_SESSION['idusuarios'])) {
        $id_usuario = $_SESSION['idusuarios'];

        $stmt = $conexao->prepare("SELECT p.*, u.* FROM pedidos p JOIN usuarios u ON p.idusuarios = u.idusuarios WHERE p.idusuarios = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result !== null && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id_pedido = $row['id_pedido'];
            $nome = $row['nome'];
            $endereco = $row['endereco'];
            $produto = $row['produto'];
            $quantidade = $row['quantidade'];
            $descricao = $row['descricao'];
            $telefone = $row['telefone'];
            $midia = $row['midia'];

            echo "<tr>";
            echo "<td>$endereco</td>";
            echo "<td>$produto</td>";
            echo "<td>$quantidade</td>";
            echo "<td>$descricao</td>";
            echo "<td>$telefone</td>";
            echo "<td>$midia</td>";
            echo "<td><button class='btn btn-danger' onclick='excluirPedido($id_pedido)'>Excluir</button></td>";
            echo "</tr>";

          }
        } else {
          echo "<tr><td colspan='9'>Nenhum pedido de coleta encontrado para este usuário.</td></tr>";
        }

        $stmt->close();
        $conexao->close();
      } else {
        echo "<tr><td colspan='9'>Usuário não encontrado.</td></tr>";
        exit;
      }
      ?>
    </tbody>
  </table>
</section>

<script>
  function excluirPedido(idPedido) {
    if (confirm("Tem certeza de que deseja excluir este pedido?")) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'excluir_pedido.php?id=' + idPedido, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = xhr.responseText;
          if (response === "success") {
            alert("Pedido excluído com sucesso.");
            window.location.reload();
          } else {
            alert("Falha ao excluir o pedido. Por favor, tente novamente mais tarde.");
          }
        }
      };
      xhr.send();
    }
  }
</script>

</main><!-- End #main -->

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