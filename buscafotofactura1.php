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
	<?php
	include("barranavegacion.php");
	?>
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
   	
  
  <div class="content-wrapper">
      <div class="container">


<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 
                 <?php 
    	/*	print_r($_GET); */
          $email  = $_GET['email'];
          $cedula = $_GET['cedula'];
          $codigofactura  = $_GET["codigo"];
				  $mes  	= $_GET["mes"];
          $ano  	= $_GET["ano"];
 					//echo "Jugadores del Club ".$nombreclub;
                  ?>
                     
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td align="center">Codigo Factura</td>
                  <td align="center">Descripciòn</td>
                  <td align="center">Foto</td>
                </tr>
                </thead>
                <tbody>
             
<?php 
			     
		include ("conexion.php");
		$sql="SELECT * from facturacion  where CIERREMES = 0 and MESFACTURACION = $mes
    and ANOFACTURACION = $ano order by CODIGOFACTURACION";
		$result=mysqli_query($mysqli,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td class="black" align="center" width="10%"  >
			  <?php
            $aaa = $mostrar['CODIGOFACTURACION'];
            echo $aaa;
        ?>
			</td>
			<td class="black" align="left">
        <?php

              $sql1="SELECT * from descripcionfacturas where CODIGOFACTURA = $aaa ";
              $result1=mysqli_query($mysqli,$sql1);

              while($mostrar1=mysqli_fetch_array($result1))
              {
                echo $mostrar1['DESCRIPCIONFACTURA'];
              }
        ?>
			</td>			
      <td class="black" align="center"  >
        <?php
           echo '<img src = "data:image/png;base64,' . base64_encode($mostrar['FOTOFACTURA']) . '" />';
        ?>
      </td>

			</tr>
		<?php 
		}

	 		?> 




                </tbody>
                <tfoot>
                <tr>
                  <td align="center">Codigo Factura</td>
                  <td align="center">Descripciòn</td>
                  <td align="center">Foto</td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

  </div>
  	</div>

 
  <!-- Main Footer -->
<?php
include("Footer.php");
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
