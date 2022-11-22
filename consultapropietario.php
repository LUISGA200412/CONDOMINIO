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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-white.css">
  <link rel="stylesheet" href="css/entrada.css">

</head>


<body class="hold-transition skin-blue layout-top-nav">
 
<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
	<?php
	include("BarraNavegacion.php");
	?>

<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
<span class="ir-arriba fa  fa-arrow-up"></span>

  <div class="content-wrapper">
      <div class="container1">

<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS --> 
     
        <div> 
              <?php
                  $email  = $_GET['email'];
                  $cedula = $_GET['cedula'];
              ?>

          <table BORDER width='100%' style=" margin-top: 10px;">
         
              <tr>
                  <td align="center"><strong>Apartamento</strong></td>
                  <td align="center"><strong>Propietario/a</strong></td>
                  <td align="center"><strong>Telefono Apto</strong></td>
                  <td align="center"><strong>Telefono Cel</strong></td>
                  <td align="center"><strong>Email Principal</strong></td>
                  <td align="center"><strong>Email Secundario</strong></td>
                  <td align="center"><strong>Foto</strong></td>
              </tr>
       
       
             
              <?php  
                      
                include ("conexion.php");
                $VENGO = 'consultapropietario.php';
                $sql="SELECT * from apartamentos order by PISO,APARTAMENTO";

                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                ?>

                <tr>
                  <td align="center"  >
                    <?php 
                        $correo = utf8_decode($mostrar['CORREOA']);
                        $nom = utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        $a= utf8_decode($mostrar['APARTAMENTO']);
                        $c=$mostrar['CEDULA'];
                        echo $a;			
                    ?>
                  </td>

                  <td align="center">
                    <?php 
                        $correo = utf8_decode($mostrar['CORREOA']);
                        $nom = utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        $n= utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        echo $nom;			
                    ?>
                  </td>			
            
                  <td class="black" align="center">
                  <?php 
                        $correo = utf8_decode($mostrar['CORREOA']);
                        $nom = utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        $telca= $mostrar['TELEFONOCA'];
                        echo $telca;			
                  ?>
                      
                  </td>			
                  
                  <td class="black" align="center">
                  <?php 
                        $correo = utf8_decode($mostrar['CORREOA']);
                        $nom = utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        $telce= $mostrar['TELEFONOCE'];
                        echo $telce;			
                  ?>
                      
                  </td>	

                  <td class="black" align="center">
                  <?php 
                        $correoa = utf8_decode($mostrar['CORREOA']);
                        $nom = utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        $a= utf8_decode($mostrar['APARTAMENTO']);
                        echo "<a href='contacto.php?VENGO=$VENGO&cedula=$cedula&email=$email&contacto=$nom&para=$correoa'>$correoa</a>";
                  ?>
                      
                  </td>	

                  <td class="black" align="center">
                  <?php 
                        $correob = utf8_decode($mostrar['CORREOB']);
                        $nom = utf8_decode($mostrar['NOMBRE']).' '.utf8_decode($mostrar['APELLIDO']);
                        $a= utf8_decode($mostrar['APARTAMENTO']);
                        echo "<a href='contacto.php?VENGO=$VENGO&cedula=$cedula&email=$email&contacto=$nom&para=$correob'>$correob</a>";
                  ?>
                      
                  </td>	

                  
                  <?php
                        echo '<td class="black" align="center"  >' .
                            '<img src = "data:image/png;base64,' . base64_encode($mostrar['FOTOPROPIETARIO']) . '" />'
                              . '</td>';
                  ?>
                  </tr>
                  <?php 
                  }

              ?>
              
       
 
          </table>
        </div>
 
<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

    	
  	</div>
  </div>

  <!-- DESDE AQUI SE PUEDE PONER OTRA DIVISION -->

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
<script src="acordeon.js"></script>
<script src="arriba.js"></script>
</body>
</html>
