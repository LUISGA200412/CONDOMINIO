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
  

    <div class="content-wrapper">
      <div class="container">

<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS -->

<section>
<?php

$cedula=$_GET['cedula'];
$email=$_GET['email'];
$VENGO = 'quienessomos.php';

include ("conexion.php"); 

?>


<table id="example1" class="table table-bordered  ">
      
      <tr>
       
          <td  align="center" colspan="5">
              Junta Directiva
              <br><br>
          </td>
      </tr>
      <tr>    
          <td valign="top" align="center">          
            <?php
             
                $sql="SELECT * FROM apartamentos WHERE TIPOPROPIETARIO = 1 ";
                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                    $nombre = utf8_decode($mostrar['NOMBRE'])." ".utf8_decode($mostrar['APELLIDO']);
                    $foto 	= $mostrar['FOTOPROPIETARIO'];
                    $correo = $mostrar['CORREOA'];
                }	

                echo '<img class="profile-user-img img-responsive img-circle"
                src = "data:image/png;base64,' . base64_encode($foto) . '"  > ';
                echo "<br>Administrador/a<br>";
                echo "<a href='contacto.php?VENGO=$VENGO&cedula=$cedula&email=$email&contacto=$nombre&para=$correo'>$nombre";
                echo "</a>";  

            ?>
          </td>
      
          <td valign="top" align="center">          
            <?php

                $sql="SELECT * FROM apartamentos WHERE TIPOPROPIETARIO = 2 ";
                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                    $nombre = utf8_decode($mostrar['NOMBRE'])." ".utf8_decode($mostrar['APELLIDO']);
                    $foto 	= $mostrar['FOTOPROPIETARIO'];
                    $correo = $mostrar['CORREOA'];
                }	

                echo '<img class="profile-user-img img-responsive img-circle"
                src = "data:image/png;base64,' . base64_encode($foto) . '"  > ';
                echo "<br>Tesorero/a<br>";
                echo "<a href='contacto.php?VENGO=$VENGO&cedula=$cedula&email=$email&contacto=$nombre&para=$correo'>$nombre";
                echo "</a>"; 

            ?> 
          </td>
      
          <td valign="top" align="center">          
            <?php
                $sql="SELECT * FROM apartamentos WHERE TIPOPROPIETARIO = 3";
                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                    $nombre = utf8_decode($mostrar['NOMBRE'])." ".utf8_decode($mostrar['APELLIDO']);
                    $foto 	= $mostrar['FOTOPROPIETARIO'];
                    $correo = $mostrar['CORREOA'];
                }	

                echo '<img class="profile-user-img img-responsive img-circle"
                src = "data:image/png;base64,' . base64_encode($foto) . '"  > ';
                echo "<br>Secretario/a<br>";
                echo "<a href='contacto.php?VENGO=$VENGO&cedula=$cedula&email=$email&contacto=$nombre&para=$correo'>$nombre";
                echo "</a>"; 

            ?> 
          </td>
      
          <td valign="top" align="center">          
            <?php
                $sql="SELECT * FROM apartamentos WHERE TIPOPROPIETARIO = 9";
                $result=mysqli_query($mysqli,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                    $nombre = utf8_decode($mostrar['NOMBRE'])." ".utf8_decode($mostrar['APELLIDO']);
                    $foto 	= $mostrar['FOTOPROPIETARIO'];
                    $correo = $mostrar['CORREOA'];
                }	

                echo '<img class="profile-user-img img-responsive img-circle"
                src = "data:image/png;base64,' . base64_encode($foto) . '"  > ';
                echo "<br>Sistema Informatico<br>";
                echo "<a href='contacto.php?VENGO=$VENGO&cedula=$cedula&email=$email&contacto=$nombre&para=$correo'>$nombre";
                echo "</a>";  
            
            ?>  
          </td>
      
        <td valign="top" align="center">          
          <?php
           ?>  
          </td>
      </tr>   
      
      
      <tr>
       
          <td class="black" align="center" colspan="5">
              Consejo Contralor
              <br><br>
          </td>
      </tr>
      <tr>    
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
      
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      </tr>   
      
      <tr>
       
          <td class="black" align="center" colspan="5">
              Consejo De Honor
              <br><br>        
          </td>
      </tr>
      <tr>    
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
          <td valign="top" align="center">          
       
          </td>
      
        <td valign="top" align="center">          
       
          </td>
      </tr>   
      
      </table>
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
</body>
</html>
