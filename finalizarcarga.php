<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">


</head>

<body>
  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li>
                  <?php
                    session_start();
                    $cedula=$_GET['cedula'];
 

                        echo "<A href='administrador.php?cedula=$cedula'>Regresar al Menu Anterior</A>";
                  ?>
          </li>

        </ul>
      </nav>
      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
    
  </header>

</body>
</html>
