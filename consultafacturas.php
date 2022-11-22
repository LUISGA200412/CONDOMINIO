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

 
         <section class="text-center"> 
            <br><br>

                <form name='formulario' id='formulario' method='GET' 
                action='consultafacturaspormesyano.php?cedula=$cedula&email=$email' target='_self' enctype="multipart/form-data"> 

                    <table>

                    <tr>
                    

                    <select  name="MESSELECCIONADO" >
                        <option     value="0">Seleccione Fecha:</option>
                        <?php


                                $email = $_GET['email']  ;
                                $cedula  = $_GET['cedula']  ;

                            include ("php/connect.php");

                            $sql="SELECT * FROM facturacion where CIERREMES = 0 GROUP BY ANOFACTURACION,MESFACTURACION";

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
                    &nbsp;&nbsp;
                    <input type="submit" value="Pulse Para Cargar la Factura"  >
                
                    </tr> 
                    </table>
                </form>
            </section>
 <br> <br> <br><br><br> <br>

 
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
