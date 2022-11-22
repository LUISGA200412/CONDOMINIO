<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
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
 


</head> 
<body>  

 
  <div align="center"  > 
   

<?php

//print_r($_POST);

$fechaActual = date('Y-d-m');

include ("php/connect.php");

$MESFACTURA           = $_POST["MES"];
$ANOFACTURA           = $_POST["ANO"];
$NOMBREFACTURAESPECIAL = $_POST["NOMBREFACTURAESPECIAL"];
//$MONTOFACTURA         = $_POST["MONTOFACTURA"];
$CEDULAFACTURA        = $_POST["CEDULAFACTURA"];
$EMAILFACTURA         = $_POST["EMAILFACTURA"];


 
$sql="SELECT * FROM `descripcionfacturas` order BY CODIGOFACTURA DESC LIMIT 1";
$result=mysqli_query($mysqli,$sql);

 
while($mostrar=mysqli_fetch_array($result))
{
    $codigofacturas = $mostrar['CODIGOFACTURA'];
     $codigofacturas++;
}

//echo "codigo a gargar ".$codigofacturas;


 
$descripcionfacturas  =strtoupper($NOMBREFACTURAESPECIAL);

$sql="INSERT INTO descripcionfacturas 
(
    CODIGOFACTURA, 
    DESCRIPCIONFACTURA,
    TIPOFACTURACION
) 
VALUES 
( 
    '$codigofacturas',
    '$descripcionfacturas',
    '1'
); 

";












/*



$CODIGOFACTURA = $unmail[0]; 

$sql="INSERT INTO facturacion 
(
  MESFACTURACION, 
  ANOFACTURACION,
  CODIGOFACTURACION, 
  FECHAFACTURACION, 
  RIFFACTURACION, 
  NUMEROFACTURACION, 
  NOMBREFACTURACION, 
  DESCRIPCIONFACTURACION, 
  MONTOFACTURACION,  
  CIERREMES, 
  CEDULAAUTORIZADO,
  FOTOFACTURA
) 
VALUES 
( 
  '$MESFACTURA',
  '$ANOFACTURA',  
  '$CODIGOFACTURA',
  '$fechaActual',
  '1',
  '1',
  '1',
  '1',
  '$MONTOFACTURA',
  '0',
  '$CEDULAFACTURA',
  ' '
)      

";     

*/



// INSERT INTO `facturacion`(`MESFACTURACION`, `ANOFACTURACION`, `CODIGOFACTURACION`, `FECHAFACTURACION`, `RIFFACTURACION`, `NUMEROFACTURACION`, `NOMBREFACTURACION`, `DESCRIPCIONFACTURACION`, `MONTOFACTURACION`, `CIERREMES`, `CEDULAAUTORIZADO`, `FOTOFACTURA`) VALUES ( '11', '2022', '8', '2022-01-01', '1', '2', '3', '4', '0', '1', '2', ' ' )
if ($mysqli->query($sql) == FALSE) {

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>Error Cargando el Registro,,,, este puede estar duplicado... Corrija</h1>";   
                echo "<center style='color:#e77b16'>";
                echo "<form id='form1' name='form1' method='post' action='CargarRubrosCondominioEspeciales.php?cedula=$CEDULAFACTURA&email=$EMAILFACTURA'>";                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";
}
else
{

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Incluido con exito</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='CargarRubrosCondominioEspeciales.php?cedula=$CEDULAFACTURA&email=$EMAILFACTURA'>";
                
                echo "<input type='submit' value='Continuar La Carga de Facturas'>";
                echo "</form>";
                
                echo "<br>";


}
$mysqli->close();

?>
 
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
 <!-- DataTables -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script> 
</body> 
</html> 