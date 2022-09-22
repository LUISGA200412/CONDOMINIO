<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Main Stylesheet File -->
  <link href="estilo.css" rel="stylesheet">

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

  <!-- Header -->
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

  <br><h2 align="center" style="color: gray">Tabla de Facturas</h2>

	<table border="5"  align="center">
		<tr>
 
			<td>Codigo Factura</td>
			<td>Descripción</td>
 
			

		</tr>

		<?php 
		include ("conexion.php");

		$sql="SELECT * from descripcionfacturas order by CODIGOFACTURA";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
			<td><?php echo $mostrar['CODIGOFACTURA'] ?></td>
			<td><?php echo $mostrar['DESCRIPCIONFACTURA'] ?></td>
	 




		</tr>
	<?php 
	}
	 ?>
	</table>


</body> 
</html> 