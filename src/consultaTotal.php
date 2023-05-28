<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['idusuarios']) || empty($_SESSION['idusuarios'])) {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM pedidos";
$result = $conexao->query($sql);

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
    
</head>
<body>  
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-5 haeder-top-date">
                        <?php echo date('j \d\e F, Y'); ?>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-7">
                        <div class="header-top-nav">
                            <ul class="list-unstyled">
                                <li><a href="cadastro_pt1.html">CADASTRO</a></li>
                                <li><a href="login.php" id="myBtn">LOGIN</a></li>
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
                            <li><a href="index.php" class="active">Inicio</a></li>
                            <li><a href="mapa.html">Pontos de Coleta</a></li>
                            <li><a href="consultaTotal.php">Pedido de Coleta</a></li>
                            <li><a href="page.html">Notícias</a></li>
                            <li><a href="contact.html">Contato</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- Header Nav Ends -->
    </header><!-- Header Top Ends Here -->
<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Produto</th>
                                <th>Quantidade (aprox kg)</th>
                                <th>Descrição</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['nome'] . "</td>";
                                    echo "<td>" . $row['produto'] . "</td>";
                                    echo "<td>" . $row['quantidade'] . "</td>";
                                    echo "<td>" . $row['descricao'] . "</td>";
                                    echo "<td><button class='btn btn-primary' onclick='solicitar(" . $row['id_pedido'] . ")'>Solicitar</button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Nenhum pedido encontrado.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

  <script>
    function solicitar(idPedido) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'processar_pedido.php?id=' + idPedido, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var telefone = xhr.responseText;
          var mensagem = encodeURIComponent("Olá, estou interessado no seu pedido no reCiclo.");
          window.location.href = "https://api.whatsapp.com/send?phone=" + telefone + "&text=" + mensagem;
        }
      };
      xhr.send();
    }
  </script>
    
    <!-- Footer Starts -->
    <section class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 testimonial footer-widget">
                        <h2>Depoimento de clientes</h2>
                        <p>tristique turpis. Vestibulum id faucibus ante, Mauris nec dolor venenatis, tristique turpis. Vestibulum id faucibus ante consequat leo a, tristique turpis. Vestibulum id faucibus ante.<br />
                        <span>JON DEO, CEO</span></p>
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
                        <p>Donec ac erat quis magna sapien eget nisl ac erat quis magna.</p>
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
                            <li><a href="mapa.html">Pontos de Coleta</a></li>
                            <li><a href="consultaTotal.php">Pedido de Coleta</a></li>
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
