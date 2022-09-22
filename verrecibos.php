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
  <link href="ib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">


</head>

<body>

  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.html">Menu Principal</a></li>
          <li><a href="acerca.html">Acerca de</a></li>
          <li><a href="consultas.html">Consultas</a></li>
          <li><a href="#portfolio">Portafolio</a></li>
          <li><a href="equipodetrabajo.html">Equipo de Trabajo </a></li>
          <li><a href="./mail/contactanos.html">Contactanos</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
  </header>
  
	<table border="1"  cellpadding="5" cellspacing="5"   align="center">


<div align="center">
      <h2>
          Seleccione el recibo que desea ver.
        </h2>
		
 			<?php  

          $ii = 0;
 			 
					$the_array = Array(); 
					$handle = opendir('fpdf/RECIBOSDEPAGO'); 
					while (false !== ($file = readdir($handle))) 
					{ 
   							if ($file != "." && $file != "..") 
   							{ 
   								$the_array[] = $file; 
   							} 
					} 
					closedir($handle); 
					sort ($the_array); 


					foreach($the_array as $val)
					{ 		

							echo "<tr>";
              echo "<td>"; 
               $ii++;
               echo $ii;
              echo "</td>";

							echo "<td>"; 
              
  							echo "<a target='_blank' href='fpdf/RECIBOSDEPAGO/$val'> $val</a>"; 
  							echo "</td>";
  							echo "</tr>";   
					}
					//$xx = end( $the_array );
					//echo "<a href='../fpdf/RECIBOSDEPAGO/$xx'>$xx</a>"; 
				 
 
				?>

 
	</table>

</div>

</body>
</html>