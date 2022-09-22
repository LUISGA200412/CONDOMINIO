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
 
    $cedula=$_POST['cedula'];
    $codfacturas=$_POST["codfacturas"];
    $desfacturas=$_POST["desfacturas"];
   

     include ("php/connect.php");

    $sql="UPDATE descripcionfacturas set

    DESCRIPCIONFACTURA     = '$desfacturas'
                                                     
    where CODIGOFACTURA = $codfacturas ";

     if (mysqli_query($mysqli, $sql)) {
     
              /*echo "<h3>
                  <A href='modificarpropietario.php'> Modificar un Propietario </A>
                </h3>";*/
                

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Modificado</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturas.php?cedula=$cedula'>";
                
                echo "<input type='submit' value='Continuar Modificando'>";
                echo "</form>";

} else {
    echo "Error updating record: " . mysqli_error($conexion);
}
?>

</body> 
</html> 