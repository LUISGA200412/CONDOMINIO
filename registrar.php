<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">

</head> 
<body> 

	<table border="1" align="center">
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

		$sql="SELECT * from apartamentos order by PISO";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
			<td style="color:#ffffff"><?php echo $mostrar['PISO'] ?></td>
			<td><?php echo $mostrar['APARTAMENTO'] ?></td>
			<td><?php echo $mostrar['CEDULA'] ?></td>
			<td><?php echo $mostrar['NOMBRE'] ?></td>
			<td><?php echo $mostrar['APELLIDO'] ?></td>
			<td><?php echo $mostrar['EMAIL-A'] ?></td>
			<td><?php echo $mostrar['EMAIL-B'] ?></td>
			<td><?php echo $mostrar['TELEFONO-CASA'] ?></td>
			<td><?php echo $mostrar['TELEFONO-CEL'] ?></td>




		</tr>
	<?php 
	}
	 ?>
	</table>


</body> 
</html> 