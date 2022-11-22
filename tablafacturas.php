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
  <link rel="stylesheet" href="css/entrada.css">

<script>
  
  function modificar(cod) 
  {

    window.location = "modtablapropietario.php?parametro="+cod;

  }

</script>
</head> 
<body class="hold-transition skin-blue layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  
<div class="content-wrapper">
      <div class="container">
  
<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 

 <!-- Header -->
  <header id="header">

  

      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<a href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</a>";
             echo "<br>"; 
 
                  echo "<h5 > 
                            <A style='color:navy'><b> Pulse </b> </A>
                            <A style='color:red' href='incluirentablafacturas.php?cedula=$cedula&email=$email'><b>  AQUI </b> </A> 
                            <A style='color:navy'> <b> si desea  Incluir mas  descripciònes de facturas <b></A>
                        </h5>" ;

                ?>
      </b></h2>

   
    
  </header> 

<table border="1" align="center">
    
      <tr align="center">
      <td style="width: 10%;">Codigo Factura</td> 
      <td style="width: 50%;">Descripción de la Factura</td> 
            <td style="width: 20%;" colspan="2">Acción</td>
      </tr>
   
    <tbody>
      <?php
      
      $cedula               =$_GET['cedula'];
      $email               =$_GET['email'];
        include ("php/connect.php");
        $query="SELECT * FROM descripcionfacturas ";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
   
      <td>".$fila['CODIGOFACTURA']."</td>

      <td>".$fila['DESCRIPCIONFACTURA']."</td>
 



            <td align='center'>
              

            <a href='modtablafacturas.php?parametro=".$fila['CODIGOFACTURA']."&cedula=$cedula&email=$email'>Modificar</a></td> 
            
   
          </tr>";
        }
          

      ?>      
    </tbody>
  </table>

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