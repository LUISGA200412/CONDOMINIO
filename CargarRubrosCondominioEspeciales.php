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

<header id="header">

    <div class="container">

        <h2 align="center"><b>
            <?php
            
            $cedula=$_GET['cedula'];
            $email=$_GET['email'];

            echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
            
        </h2>
        <h3 class="text-center" style="color: red;">
            <strong>Cargar Factura Especiales del Recibo de Condominio</strong>
        </h3>

    </div>

</header>      
 
</div>


<div align="center"  > 

<br>
<form name='formulario' id='formulario' method='post' action='incluirfacturacionrubroespecial.php' target='_self' enctype="multipart/form-data"> 

<table    width="1200px"> 

<tr > 
<td class="text-center">
    <?php
        
        $cedula=$_GET['cedula'];
        $email=$_GET['email'];


        $session['cedula'] = $cedula;
        include ("php/connect.php");

      $sql="SELECT * from facturacion WHERE   CIERREMES = 1 order by 
      ANOFACTURACION,MESFACTURACION DESC LIMIT 1";

        $result=mysqli_query($mysqli,$sql);
        $mes = 0;
        while($mostrar1=mysqli_fetch_array($result))
        {
             
            $mes=$mostrar1['MESFACTURACION'];
            $ano=$mostrar1['ANOFACTURACION'];
    
        }

          if ($mes == 12) {
             $ano++;
             $mes = 1;
          }
          else
            { $mes = $mes + 1; }

        
    ?>

         Año a cargar <input type="text" value="<?php echo $ano; ?> " disabled size="3" maxlength="3" >  
        Mes a cargar <input type="text" value="<?php echo $mes; ?> " disabled size="2" maxlength="2">
         <input type="hidden" name="MES" value="<?php echo $mes; ?> "> 
         <input type="hidden" name="ANO" value="<?php echo $ano; ?> ">  
</td>
</tr>

 
 
 
      
    <tr>
        <td class="text-center"><h2>Nombre Factura Especial a pagar</h2>
  
            <input type="text" name="NOMBREFACTURAESPECIAL" size="60" required />
          </td>
    </tr>
<!-- 
<tr>
  <td class="text-center"><h2>Monto Factura Especial a pagar</h2>
          <input type="text" name="MONTOFACTURA" id="MONTOFACTURA" title="Este concepto es OBLIGATORIO, si el MONTO ES EXACTO se coloca 1000 sin decimales, o con decimales 1234,50" onChange="validarSiNumero(this.value);" required />   
    </td>
</tr>
        -->
    <tr>
        <td>      
            <input type="hidden" name="ss" />
        </td>
    </tr>
 <tr>
<tr>            
    <td class="text-center">  <br>
      <input type="submit" value="Cargar la Factura Especial"  >
     </td>
  <input type="hidden" name="CEDULAFACTURA" value="<?php echo $cedula; ?> "> 
  <input type="hidden" name="EMAILFACTURA" value="<?php echo $email; ?> "> 

</tr> 
</table>

</form>
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
