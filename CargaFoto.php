<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/entrada.css">

 

</head>

<body class="hold-transition skin-blue layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  
<div class="content-wrapper">
      <div class="container">
  
<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 



<header id="header" class="text-center">
	<?php
/* print_r($_GET);
echo "<br>";
print_r($_POST);
*/
 
include ("conexion.php");

    /* print_r($_GET); */
	$codigo=$_GET["CODIGO"];
	$unmail = explode(".", $codigo);
	$cod = $unmail[0]; 
	$nombre = $unmail[1]; 


			$mes           = $_GET["mes"];
			$ano           = $_GET["ano"];
			$cedula        = $_GET["cedula"];
			$email         = $_GET["email"];
		 
		
			$sql1 = "SELECT * FROM descripcionfacturas where CODIGOFACTURA = '$cod' ";
         
			$result1=mysqli_query($mysqli,$sql1); 
			while($mostrar1=mysqli_fetch_array($result1))
			  {

				$bbb = $mostrar1['DESCRIPCIONFACTURA'];

			  }	
		  echo "<h2>
		  <a href='CargarFotoFactura.php?cedula=$cedula&email=$email&mes=$mes&ano=$ano'>Regresar al Menu Anterior</a>
		  </h2>
		  <br>
		  <h3 class='text-center' >
		   SE CARGARA LA FOTO DE LA FACTURA : $nombre
		   </h3>
		  ";
		
	?>
 
  <h2  style='color:brown'>
<!--	Bienvenidos al Módulo Cargar Foto del Jugador-->
	
	<p>
			debe seleccionar una imagen con un tamaño menor 1 Mb ( 1.000.000 kb )
	</p>	
</h2>
</header>

<div>
	<h4 class="text-center">
  <?php 
//print_r($_GET);

 
include("conexion.php");
 
 //echo "<br> pokejrfgijifjd $cedula";

echo "
	<form action='UploadFotoFactura.php?cedula=$cedula&email=$email&mes=$mes&ano=$ano&cod=$cod' method='post' enctype='multipart/form-data'>

<table border='1' width='600px' style='margin-left:300px;' >
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
	</h4>
</div> 

<!-- HASTA AQUI SE DEBE PONER LOS CODIGOS --> 

</div>
</div>
 
<!-- FOOTER --> 
<?php
include("footer.php");
?>
 

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>