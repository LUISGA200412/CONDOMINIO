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
	include("BarraNavegacion.php");
?>
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
<span class="ir-arriba fa  fa-arrow-up"></span>


    <div class="content-wrapper">
      <div class="container">

<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS -->    

     <section class="main">
        <div class="wrapp">
            <div class="mensaje text-center">
                <h1>Facturas Canceladas <?php 
                       echo "El Mes ".$_GET['MESSELECCIONADO']." Del ".$_GET['ANO'];
                 ?></h1>
            </div>

 

                         <?php
                           //print_r($_GET);

 				                   $email  = $_GET['email'];
				                   $cedula = $_GET['cedula'];
                           $mes    = $_GET['MESSELECCIONADO'];
                           $ano    = $_GET['ANO'];
                           $i = 0;
                           $tmp[] = "";
                           include ("conexion.php");

                           $sql="SELECT * FROM facturacion WHERE 
                           MESFACTURACION = $mes and ANOFACTURACION = $ano 
                           order by CODIGOFACTURACION";

                           $result=mysqli_query($mysqli,$sql);
                           while($mostrar=mysqli_fetch_array($result))
                           {     
                            $codigo = $mostrar['CODIGOFACTURACION'];
                            $fecha  = $mostrar['FECHAFACTURACION'];
                            $tmp[$i] = $codigo;
                            $tmp1[$i] = $fecha;
                            $i++;           
                           }
 
                        ?>

                   <table border="1"  align="center">
                    <tr>

                      <td align="center" WIDTH="100">Codigo Factura</td>  
                      <td align="center" WIDTH="500" >Descripciòn</td> 
                      <td align="center" WIDTH="200" >Fecha Cancelaciòn</td> 
 
                      </tr>
                                           
                          <?php
                        $totalresultado = count($tmp);
                      for ($a=0; $a <= $totalresultado-1  ; $a++) 
                      { 
                         $cod = $tmp[$a];
                         $fec = $tmp1[$a];

                          if ($cod < 10) {
                              $codigo = "0".$cod;
                          }else {
                            $codigo = $cod;
                          }


                          $sql1="SELECT * from descripcionfacturas where 
                          CODIGOFACTURA = $codigo";
                          $result1=mysqli_query($mysqli,$sql1); 
                          while($mostrar1=mysqli_fetch_array($result1))
                          {
                            $descripcion = $mostrar1['DESCRIPCIONFACTURA'];
                       
                            echo "<tr>";
                            echo "<td align='center' WIDTH='100' >$codigo</td>";
                            echo "<td style='font-size: 12px;' align='left'   WIDTH='500'>
                            
                            <a href='buscafotofactura.php?cedula=$cedula&email=$email&codigo=$codigo&mes=$mes&ano=$ano&nombrefactura=$descripcion'>$descripcion</a>
                            
                            </td>";
                            echo "<td align='center' WIDTH='200'>$fec</td>";

                         echo "</tr>"; 
                          }
  
                      }
                        ?>
                          
                    </table>
                      <?php
    $email = $_GET['email']  ;
    $cedula  = $_GET['cedula']  ;
 
    echo "<br>";
    echo "<h4 class='text-center'>"; 
    echo "<A  HREF='consultafacturas.php?cedula=$cedula&email=$email' > Seleccionar Otra Fecha</A>";
    echo "</h4>"; 
  ?>
 
 


        </div>
 
    </section>
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