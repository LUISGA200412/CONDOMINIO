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
<body class="hold-transition skin-red layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   


<div class="content-wrapper">
      <div class="container">

<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 

 

 
   

<?php
//print_r($_POST);

include ("conexion.php");

$MESFACTURA           = $_POST["MES"];
$ANOFACTURA           = $_POST["ANO"];
//$COD                  = $_POST["CODIGOFACTURA"];
$CODIGOFACTURA        = $_POST["CODIGOFACTURA"];
$FECHAFACTURA         = $_POST["FECHAFACTURA"];
$RIFFACTURA           = $_POST["RIFFACTURA"];
$NUMEROFACTURA        = $_POST["NUMEROFACTURA"];
$NOMBREFACTURA        = strtoupper($_POST["NOMBREFACTURA"]);
$DESCRIPCIONFACTURA   = strtoupper($_POST["DESCRIPCIONFACTURA"]);
$MONTOFACTURA         = $_POST["MONTOCFACTURA"];
$CEDULAFACTURA        = $_POST["CEDULAFACTURA"];
$EMAILFACTURA         = $_POST["EMAILFACTURA"];


 
 
$sql= "UPDATE facturacion 
SET 


FECHAFACTURACION        = '$FECHAFACTURA',
RIFFACTURACION          = '$RIFFACTURA',
NUMEROFACTURACION       = '$NUMEROFACTURA',
NOMBREFACTURACION       = '$NOMBREFACTURA',
DESCRIPCIONFACTURACION  = '$DESCRIPCIONFACTURA',
MONTOFACTURACION        = $MONTOFACTURA

WHERE 
MESFACTURACION  = $MESFACTURA and 
ANOFACTURACION = $ANOFACTURA and 
CODIGOFACTURACION = $CODIGOFACTURA " ;


if ($mysqli->query($sql) == FALSE) {

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>Error Actualizando el Registro,,,, este puede estar duplicado... Corrija</h1>";   
                echo "<center style='color:#e77b16'>";
                echo "<form id='form1' name='form1' method='post' action='tablafacturacion.php?cedula=$CEDULAFACTURA&email=$EMAILFACTURA'>";                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";
}
else
{

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro Actualizado con exito</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturacion.php?cedula=$CEDULAFACTURA&email=$EMAILFACTURA'>";
                
                echo "<input type='submit' value='Continuar La Carga de Facturas'>";
                echo "</form>";
                
                echo "<br>";


}
$mysqli->close();

?>
 
  

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