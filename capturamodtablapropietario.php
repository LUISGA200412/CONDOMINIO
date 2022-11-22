<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">



</head> 
<body> 

  <?php 


 

    $nombre=$_POST["txnombre"];
    $apellido=$_POST["txapellido"];
    $txcorreoa=$_POST["txcorreoa"];
    $txcorreob=$_POST["txcorreob"];
    $telefonoca=$_POST["txtelefonoca"];
    $telefonoce=$_POST["txtelefonoce"];




/* foreach ($_POST as $key => $value)
    echo $key.' = '.$value.'<br />'; */

  $funcion=$_POST["funcion"];

  $cod=$_POST["cod"];

$unmail = explode(".", $cod); 

$piso = $unmail[0]; 
$apar = $unmail[1]; 
$cedula = $unmail[2]; 
$email = $unmail[3]; 

$unmail[2] =  $_POST["cedula"];
$unmail[3] = $_POST["email"]; 

$cedula = $unmail[2]; 
$email = $unmail[3];




    include ("php/connect.php");

    $sql="UPDATE apartamentos set

    NOMBRE      = '$nombre', 
    APELLIDO    = '$apellido',

    CORREOA     = '$txcorreoa',
    CORREOB     = '$txcorreob',
    TELEFONOCA  = '$telefonoca', 
    TELEFONOCE  = '$telefonoce' 
                                                     
    where PISO = $piso and APARTAMENTO = '$apar'";

/*header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='downloaded.pdf'");

// The PDF source is in original.pdf
readfile("Comprobante.pdf"); */

     if (mysqli_query($mysqli, $sql)) {
     
                    /*session_start();*/
                  

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Modificado</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='modificarpropietario.php?cedula=$cedula&email=$email'>";
                
                echo "<input type='submit' value='Regresar al Menu Anterior'>";
                echo "</form>";
} else {
    echo "Error updating record: " . mysqli_error($mysqli);
}
?>

</body> 
</html> 