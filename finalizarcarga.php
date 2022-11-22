<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Condominio</title>
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
  
<body class="hold-transition skin-red layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  

    <div class="content-wrapper">
      <div class="container">

<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 


      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
        </b>
      </h2>
 

<div align="center">




<?php
include ("conexion.php");

$mysqli->set_charset("utf8");
 
 $query1="SELECT * FROM facturacion WHERE CIERREMES = 0 ";
 $resultado1=$mysqli->query($query1);
 
while($fila11=$resultado1->fetch_array(MYSQLI_ASSOC))
 
{
  
      $mesfacturacion = $fila11['MESFACTURACION'];
      $anocierre = $fila11['ANOFACTURACION'];

      $mescierre = $mesfacturacion;
      if ( $mesfacturacion < 10 )
      {

        $mesfacturacion = "0".$mesfacturacion;
      }
}

if (isset($mesfacturacion)) {
 

 
    $f=" AÑO ";
    $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes = $mes[($mesfacturacion * 1) -1 ];
    $messalida = "DEL MES ".date($mesfacturacion).$f.date("$anocierre");

echo "<h3 style='color: red'>";
echo "<b>";
echo "<br><br><br><br><br><br>";
echo "ESTE PROCESO CERRARA LA GENERACION DE PAGOS ".$messalida; 
echo "<br><br>";
echo " SI ESTA COMPLETAMENTE SEGURO PULSE ";
echo "<br><br>";
 
echo "<form action='cerrarelmes.php?cedula=$cedula&mes=$mescierre&ano=$anocierre&email=$email' method='post'>";
echo  "<input type='submit' value='Cerrar el Mes'>";

echo "</form>";


 }
else
{
    echo "<script>alert('No Existe Ningun Mes Para Cerrar..... Corrija y carge un mes');
            location.href ='../administrador.php?cedula=$cedula&email=$email';
             </script>"; 
}
 
?>

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

<script src="acordeon.js"></script>
<script src="arriba.js"></script>

</body>
</html>