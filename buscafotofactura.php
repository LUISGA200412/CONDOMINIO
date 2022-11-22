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

<body class="hold-transition skin-red layout-top-nav">
 
<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
   	
  
  <div class="content-wrapper">
      <div class="container">


<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 
            <?php 
            //	print_r($_GET);

                $email  = $_GET['email'];
                $cedula = $_GET['cedula'];
                $descripcion = $_GET['nombrefactura'];
                $codigofactura  = $_GET["codigo"];
                $mes  	= $_GET["mes"];
                $ano  	= $_GET["ano"];
            ?>

            <div class="mensaje text-center">
                <h1 style="color: green;">Factura Cancelada</h1>
                <h2 style="color: blue;">
                  <?php 
                      echo $_GET['nombrefactura'];
                      echo "<br> del Mes ".$_GET['mes']." Del ".$_GET['ano'];
                 ?>
                 </h2>
            </div>

            <!-- /.box-header -->
 
            <div class="mensaje text-center">

                <?php 
                    
                  include ("conexion.php");
                  $sql="SELECT * from facturacion  where CIERREMES = 0 
                  and CODIGOFACTURACION = $codigofactura 
                  and MESFACTURACION = $mes
                  and ANOFACTURACION = $ano ";
                  $result=mysqli_query($mysqli,$sql);

                  while($mostrar=mysqli_fetch_array($result))
                  {
              
                        echo '<img src = "data:image/png;base64,' . base64_encode($mostrar['FOTOFACTURA']) . '" />';
                    
                  }


                  echo "<h2>
                  <a href='consultafacturaspormesyano.php?cedula=$cedula&email=$email&MESSELECCIONADO=$mes&ANO=$ano'>Regresar al Menu Anterior</a>
                  </h2>";


                ?> 

            </div>

 

<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

  </div>
  	</div>

 
  <!-- Main Footer -->
<?php
include("footer.php");
?>
  
<!-- jQuery 2.2.0 -->  
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

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
