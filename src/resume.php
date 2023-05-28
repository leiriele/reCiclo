<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['idusuarios']) || empty($_SESSION['idusuarios'])) {
    header('Location: login.php'); 
    exit; 
}


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
  <link href="assets/css/main.css" rel="stylesheet">

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
          <li><a href="resume.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
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
<section>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Descrição</th>
                <th>Telefone</th>
                <th>Mídia</th>
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
                        echo "<td>$id_pedido</td>";
                        echo "<td>$nome</td>";
                        echo "<td>$endereco</td>";
                        echo "<td>$produto</td>";
                        echo "<td>$quantidade</td>";
                        echo "<td>$descricao</td>";
                        echo "<td>$telefone</td>";
                        echo "<td>$midia</td>";
                        echo "<td><button class='btn btn-primary' onclick='solicitar($id_pedido)'>Solicitar</button></td>";
                        echo " <td><button class='btn btn-danger' onclick='excluir($id_pedido)'>Excluir</button></td>";
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
    function solicitar(idPedido) { // AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'processar_pedido.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Redirecionar para a página do WhatsApp
                var telefone = xhr.responseText; // Número de telefone retornado pelo servidor
                var mensagem = encodeURIComponent("Olá, estou interessado no seu pedido no reCiclo.");
                window.location.href = "https://api.whatsapp.com/send?phone=" + telefone + "&text=" + mensagem;
            }
        };
        xhr.send();
    }
</script>
<script>
    function excluir(idPedido) {
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

  </main>

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