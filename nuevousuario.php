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
                <div class="text-center">
                <h1>
                    <?php
                    include ("conexion.php");

                    $query="SELECT * FROM apartamentos WHERE  CEDULA=6821253";
                    $consulta2=$mysqli->query($query);
                  
                     $fila=$consulta2->fetch_array(MYSQLI_ASSOC);
                  
                      echo "AUN NO ESTAS REGISTRADO !<br>";
                      echo "COMUNICATE CON EL ADMINISTRADOR DEL EDIFICIO <br>";

                      echo "<h7 style='color:red; margin-left: 100px'>";
                      echo $fila['NOMBRE']." ".$fila['APELLIDO'];
                      echo "</h7>";
                      
                      echo "<h6 style='color:BLUE'>";
                      echo "Por su Email : ".$fila['CORREOA']." o Por su Telefono ".$fila['TELEFONOCE'];
                      echo "</h6>";
                  
                  
                      echo "<h4 style='margin-left: 100px'>"; 
                      echo "<A  HREF='index.php' > PULSA PARA REGRESAR </A>";
                      echo "</h4>";
                      ?>
                </h1>
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
</body>
</html>
