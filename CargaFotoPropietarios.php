<!DOCTYPE html> 
<html> 
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Liga Picapiedras CMLR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/entrada.css">

<style>

body{
	 background: #b7dbe2;
}

</style>

</head>

<body>


<section  class="text-center">       

	<div>
		<?php
			/* print_r($_GET);
			echo "<br>";
			print_r($_POST);
			*/
			
			include ("conexion.php");

		/* print_r($_GET); */
		$codigo=$_GET["CODIGO"];
		$unmail = explode(".", $codigo);
		$piso= $unmail[0]; 
		$ced = $unmail[1]; 
		$nombre = $unmail[2]; 



				$cedula        = $_GET["cedula"];
				$email         = $_GET["email"];
			
			
			echo "<h2>
			<a href='CargarPropietario.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</a>
			</h2>
			<br>
			<h3 class='text-center' >
			SE CARGARA LA FOTO DEL PROPIETARIO/A : $nombre
			</h3>
			";
			
		?>
	
		<h2  style='color:brown'>
		
			<p>
				debe seleccionar una imagen con un tamaño menor 1 Mb ( 1.000.000 kb )
			</p>

		</h2>
	</div>

	<div>
		<?php 
		//print_r($_GET);

		
		include("conexion.php");
		
		//echo "<br> pokejrfgijifjd $cedula";

		echo "
			<form style='margin-left: 400px; font-size:24px;'
			action='UploadFotoPropietario.php?cedula=$cedula&email=$email&ced=$ced' method='post' enctype='multipart/form-data'>

		<table border='1'  >
			<tr>
				<td style='text-align:center;'>
					Seleccione la imagen a Cargar:
				</td>
			</tr>

			<tr>
				<td class='tdc'>
					<input type='file' name='image'/>
				</td>
			</tr>

			<tr> 
				<td style='text-align:center;'>  
					<input type='submit' name='submit' value='Cargar'/>
				</td>
			</tr>
		</table>
			
			</form>";
			


		?>
	</div> 

</section>

</body>
</html>