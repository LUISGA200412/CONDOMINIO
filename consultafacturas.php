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

input 
{
    color:black;

}

select{
    color:black;
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

<div class="col-lg-12 col-xs-12" align="center" >
    <div class='small-box bg-red'>
        
        

                <form name='formulario' id='formulario' method='GET' 
                action='consultafacturaspormesyano.php?cedula=$cedula&email=$email' target='_self' enctype="multipart/form-data"> 

                    <table class="colo" border="1"  align="center">

                    <tr>
                    

                    <select name="MESSELECCIONADO" >
                        <option     value="0">Seleccione Fecha:</option>
                        <?php


                                $email = $_GET['email']  ;
                                $cedula  = $_GET['cedula']  ;

                            include ("php/connect.php");

                            $sql="SELECT * FROM facturacion WHERE CIERREMES = 1 GROUP BY ANOFACTURACION,MESFACTURACION";

                            $result=mysqli_query($mysqli,$sql);
                            while($mostrar=mysqli_fetch_array($result))
                            {     

                                        if ($mostrar['MESFACTURACION'] < 10) {
                                            $mes = "0".$mostrar['MESFACTURACION'];
                                        }else {
                                            $mes = $mostrar['MESFACTURACION'];
                                        }

                                    
                                    $ano = $mostrar['ANOFACTURACION'];
                                    $ccc = $mes."-".$ano;
                                    echo '<option  value="'.$mes.'">'.$ccc.'</option>';
                            }
                        ?>
                        </select>  



                    </tr>
                    <tr>   


                    <input type="hidden" name="ANO" value="<?php echo $ano; ?> "> 
                    <input type="hidden" name="MES" value="<?php echo $mes; ?> "> 
                    <input type="hidden" name="cedula" value="<?php echo $cedula; ?> "> 
                    <input type="hidden" name="email" value="<?php echo $email; ?> ">
                    <input type="submit" value="Pulse Para Cargar la Factura"  >
                
                    </tr> 
                </table>

                </form>
                </div>
                </div>
                </div>

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