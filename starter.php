<!DOCTYPE html> 
<html> 
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Residencias Sayecito</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- iCheck 
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css"> -->

  <!-- Morris chart 
  <link rel="stylesheet" href="plugins/morris/morris.css">
  -->

  <!-- jvectormap 
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->

  <!-- Date Picker 
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> -->

  <!-- bootstrap wysihtml5 - text editor 
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
  
<style>

@media only screen and (max-width: 90px)
{

    .row.show{

        margin-top: 15px;

        margin-left: 5px;

        max-width: 100px;

        transform: scale(.2);
    
    }   
}  

</style>

</head>

<body class="hold-transition skin-green layout-top-nav">
 

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
	<?php
	include("BarraNavegacion.php");
	?>
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
	<div class="content-wrapper">
		<section class="content">


<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS -->

 


<!-- HASTA AQUI SE DEBEN PONER LOS PROGRAMAS -->

	  </section>
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
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
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