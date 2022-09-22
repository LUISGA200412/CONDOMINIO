<?php   include("redessociales.php") ?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">


</head> 
<body> 


<?php
                                
     include ("php/connect.php");

 
$cedula               =$_GET['cedula'];
$descripcionfacturas  =$_GET['desfacturas'];
$codigofactura        =$_GET['codfacturas']; 

            $sql="INSERT INTO descripcionfacturas (CODIGOFACTURA, DESCRIPCIONFACTURA) VALUES ( '$codigofactura','$descripcionfacturas'); ";
      

if ($mysqli->query($sql) === FALSE) {

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>Error Cargando el Registro,,,, este puede estar duplicado... Corrija</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturass.php?cedula=$cedula'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";

}
else
{
                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Incluido con exito</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturas.php?cedula=$cedula'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";

}

$mysqli->close();

?>




</body> 
</html> 