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
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->      
  
	<div class="content-wrapper">
		<section class="content">

    <h3 align="center">
                
                <?php 
                           
                  $cod=$_GET["parametro"];
                  $unmail = explode(".", $cod); 
                  $piso = $unmail[0]; 
                  $apar = $unmail[1]; 
                  $cedula = $unmail[2]; 
                  $email = $unmail[3]; 
          
          
                   echo "<A href='modificarpropietario.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
                ?>
          
            </h3>


<!-- DESDE AQUI SE DEBEN PONER LOS PROGRAMAS -->

 

<?php 

include ("php/connect.php");

$sql="SELECT * from apartamentos where PISO = $piso and APARTAMENTO = '$apar'  ";
$result=mysqli_query($mysqli,$sql);

?>

<form action="capturamodtablapropietario.php" method="POST">

<table border="4" align="center" width="500">

<?php foreach ($result as $key => $value)  {?>

<tr>
  <td>Piso</td> 
  <td><?php echo $piso?></td>
</tr>

<tr>
<td>Apartamento Nº</td> 
      <td><?php echo $apar?></td>
</tr>

<tr>
<td>Nombre</td> 
      <td><input type="text" name="txnombre" value="<?php echo $value["NOMBRE"]; ?>" required></td>
</tr>

<tr>
<td>Apellido</td> 
      <td><input type="text" name="txapellido" value="<?php echo $value["APELLIDO"]; ?>" required></td>
</tr>

<tr>
<td>Email Principal</td>
      <td><input type="text" name="txcorreoa" value="<?php echo $value["CORREOA"]; ?>" required></td>
</tr>

<tr>
<td>Email Secundario</td>
      <td><input type="text" name="txcorreob" value="<?php echo $value["CORREOB"]; ?>" required></td>
</tr>

<tr>
<td>Telefono Hogar</td> 
      <td><input type="text"  name="txtelefonoca" value="<?php if(is_numeric($value["TELEFONOCA"])) {echo $value["TELEFONOCA"]; } else { echo " NO es numérico"; } ?> " required></td>
</tr>

<tr>
<td>Telefono Celula</td> 
      <td><input type="text"  name="txtelefonoce" value="<?php if(is_numeric($value["TELEFONOCE"])) {echo $value["TELEFONOCE"]; } else { echo " NO es numérico"; } ?> " required></td>
</tr>


<tr>
  <td colspan="2"><input type="submit" value="Guardar"></td>
</tr>

<?php } ?>

</table>
<input type="hidden" name="cedula" value="<?php echo $cedula; ?> "> 
<input type="hidden" name="email" value="<?php echo $email; ?> "> 

<input type="hidden" name="funcion" value="modificar">;
<input type="hidden" name="cod" value="<?php echo $cod; ?>">


</form>

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