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


<style>

div.largo{
  margin-left:25px;
  margin-top:10px;
  width: 1270px; 
  font-size:12px;
}
body{
	 background: #b7dbe2;
}
th{
	text-align:center;
}

h2{
	text-align:center;
}
</style>
</head>

<body>

<div class="largo">

<div>
<!--  <h2>
    <a     href="PerfilAdministrador.php"><b>Liga Picapiedras CMLR</b><br>
    Modúlo de Administradores<br>
    Regresar al Menu Anterior</a>
  </h2>
-->

	<?php
//print_r($_GET);

 
		 $cedula=$_GET["cedula"]; 
		 $email=$_GET["email"];  
 		 $mes=$_GET["mes"];
		 $ano=$_GET["ano"];
		 $cod=$_GET["cod"];    

		 echo "<h2>
		 <a href='CargarFotoFactura.php?cedula=$cedula&email=$email&mes=$mes&ano=$ano'>Regresar al Menu Anterior</a>
		 </h2>";
	?>
</div>



<?php
 	

include ("conexion.php");


if(isset($_POST["submit"]))
{


	//$check = getimagesize($_FILES["image"]["tmp_name"]);
	if(getimagesize($_FILES["image"]["tmp_name"]) !== false)
	{


	$fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size']; 
    $fileType = $_FILES['image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

/*	 
echo "path imagen ".$fileTmpPath."<br>";
echo "nombre imagen ".$fileName."<br>";
echo "tamaño imagen ".$fileSize."<br>";
echo "tipo imagen ".$fileType."<br>";
echo "extencion imagen ".$fileExtension."<br>";
*/
		if ($fileSize > 1000000  ) 
		{
			echo "<div align='center'>
			<h1  style='color:BLUE'>
				Bienvenidos al Modulo de Cargar Foto de Facturas Canceladas
			</h1>
			<h1  style='color:brown'>
				<p>
			debe seleccionar una imagen menor a 1 Mb ( 1.000.000 kb )
				</p>
                <p>
                    la imagen que Quiere Cargar tiene un Tamaño de : $fileSize
                </p>
			</h1>
			 ";
		}
		else
		{






			$image = $_FILES['image']['tmp_name'];
		    $imgContent = addslashes(file_get_contents($image));
	        
			$update = $mysqli->query("UPDATE facturacion SET 
			FOTOFACTURA = '$imgContent'
	 		WHERE CODIGOFACTURACION = $cod and
				  MESFACTURACION = $mes and
				  ANOFACTURACION = $ano ");

	        if($update)
	        {
				echo "<div align='center'> 
				<table >
					<tr>
					<td   align='center' >
				<h1  style='color:brown'>
						LA FOTO FUE CARGADA...... GRACIAS
				</h1>

					</td>
					</tr>

				</div>	
				    	";
	        }
	        else
	        {
			     echo "File upload failed, please try again.";
			}

		}// fin else de $fileSize

    } 
    else
    { 
 		echo "<div align='center'>
		
		<h1  style='color:brown'>
			
		debe seleccionar una imagen
 	 
		</h1>
		 ";

    } // fin else de $check

}//cierre if de isset


?>
</div>


</body>
</html>