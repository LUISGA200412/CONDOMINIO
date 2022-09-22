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

	  <header id="header">
    <div class="container">


      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="crearpropietario.html">Regresar al Menu Anterior</a></li>

        </ul>
      </nav>
      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>

    </div>
  </header>

	<table border="5"  align="center">
		<tr>
			<td>Piso</td>	
			<td>Apartamento Nº</td>	
			<td>Cedula</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Email Principal</td>
			<td>Email Secundario</td>
			<td>Telefono Hogar</td>	
			<td>Telefono Celular</td>
			

		</tr>

		<?php 
		include ("conexion1.php");

		$sql="SELECT * from apartamentos order by PISO,APARTAMENTO";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
			<td><?php echo $mostrar['PISO'] ?></td>
			<td><?php echo $mostrar['APARTAMENTO'] ?></td>
			<td><?php echo $mostrar['CEDULA'] ?></td>
			<td><?php echo $mostrar['NOMBRE'] ?></td>
			<td><?php echo $mostrar['APELLIDO'] ?></td>
			<td><?php echo $mostrar['EMAILA'] ?></td>
			<td><?php echo $mostrar['EMAILB'] ?></td>
			<td><?php echo $mostrar['TELEFONOCA'] ?></td>
			<td><?php echo $mostrar['TELEFONOCE'] ?></td>




		</tr>
	<?php 
	}
	 ?>
	</table>


</body> 
</html> 