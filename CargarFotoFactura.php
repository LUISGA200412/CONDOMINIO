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

<body class="hold-transition skin-blue layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  
<div class="content-wrapper">
      <div class="container">
  
<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS -->  
       
 
<header id="header" class="text-center">
  <h2>

    <?php
            /*       print_r($_GET); */

          $email  = $_GET['email'];
          $cedula = $_GET['cedula'];
          $ano    = $_GET['ano'];
          $mes    = $_GET['mes'];
           
          echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
        
    ?>
 
  </h2>

<h2  style='color:brown'>
	Cargar Foto de las Facturas Canceladas <br>
  <?php
  echo "del Mes ".$mes." Año ".$ano;
  ?>
</h2>

</header>

 
<table style="margin-left: 400px; margin-top: 10px;" >
<tr>
 
    <td>
       
	<br>       

  <form style="	text-align:center;" name='formulario' id='formulario' method='get' action=' CargaFoto.php'
   target='_self' enctype="multipart/form-data"> 

  

<select name="CODIGO" id="selec" required>  

         <option value="">Seleccione la Factura:</option> 

        <?php

        include ("conexion.php");
 

		    $sql = "SELECT * FROM facturacion where CIERREMES = 0 and FOTOFACTURA = ''
                	order by CODIGOFACTURACION ";
       
        $result=mysqli_query($mysqli,$sql); 
	      while($mostrar=mysqli_fetch_array($result))
        {
        	    $aaa = $mostrar['CODIGOFACTURACION'];

              $sql1 = "SELECT * FROM descripcionfacturas where CODIGOFACTURA = $aaa ";
         
              $result1=mysqli_query($mysqli,$sql1); 
              while($mostrar1=mysqli_fetch_array($result1))
                {

                  $bbb = $mostrar1['DESCRIPCIONFACTURA'];

                }

                $ccc = $aaa.".".$bbb;      
                echo '<option  value="'.$aaa.'.'.$bbb.' ">'.$bbb.'</option>';
        }

                      
        ?>
       </select> 
       <br><br> 
      
 	  		<input type="submit" value="Cargar">
         <input type="hidden" name="cedula" value="<?php echo $cedula; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="ano" value="<?php echo $ano; ?>">
        <input type="hidden" name="mes" value="<?php echo $mes; ?>">
       </form>
  </td>


</tr>   
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
</body>
</html>