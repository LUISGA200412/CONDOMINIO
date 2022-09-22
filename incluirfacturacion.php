<?php   include("redessociales.php") ?>
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

 

  <div align="center"  > 
   

<?php
/*print_r($_POST);*/

include ("php/connect.php");

$MESFACTURA           = $_POST["MES"];
$ANOFACTURA           = $_POST["ANO"];
$COD                  = $_POST["CODIGOFACTURA"];
$FECHAFACTURA         = $_POST["FECHAFACTURA"];
$RIFFACTURA           = $_POST["RIFFACTURA"];
$NUMEROFACTURA        = $_POST["NUMEROFACTURA"];
$NOMBREFACTURA        = $_POST["NOMBREFACTURA"];
$DESCRIPCIONFACTURA   = $_POST["DESCRIPCIONFACTURA"];
$MONTOFACTURA         = $_POST["MONTOCFACTURA"];
$CEDULAFACTURA        = $_POST["CEDULAFACTURA"];

$unmail = explode(" ", $COD); 

/*echo print_r($unmail); echo "<br>";*/

$CODIGOFACTURA = $unmail[0]; 

            $sql="INSERT INTO facturacion (MESFACTURACION, ANOFACTURACION,CODIGOFACTURACION, FECHAFACTURACION, RIFFACTURACION, NUMEROFACTURACION, NOMBREFACTURACION, DESCRIPCIONFACTURACION, MONTOFACTURACION,  CIERREMES, CEDULAAUTORIZADO) 
VALUES 
/*
( '2',
  '2',
  '',
  '22222',
  '33',
  'ACTURA',
  'DESCRIPCIONFACTURA',
  '23',
  '0',
  '3718104');      
*/            
 
( '$MESFACTURA',
  '$ANOFACTURA',  
  '$CODIGOFACTURA',
  '$FECHAFACTURA',
  '$RIFFACTURA',
  '$NUMEROFACTURA',
  '$NOMBREFACTURA',
  '$DESCRIPCIONFACTURA',
  '$MONTOFACTURA',
  '0',
  '$CEDULAFACTURA');      ";     

if ($mysqli->query($sql) == FALSE) {

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>Error Cargando el Registro,,,, este puede estar duplicado... Corrija</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturacion.php?cedula=$CEDULAFACTURA'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";
}
else
{

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Incluido con exito</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturacion.php?cedula=$CEDULAFACTURA'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";















}
$mysqli->close();

?>
 
  </div>

</body> 
</html> 