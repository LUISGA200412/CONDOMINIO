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
            //print_r($_GET);

            $tipofacturacion=$_GET['tipofacturacion'];
            $cedula=$_GET['cedula'];
            $email=$_GET['email'];

            echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
            
        </h2>
        <h3 class="text-center" style="color: red;">
            <strong>Cargar Rubros del Recibo de Condominio</strong>
        </h3>

    </div>

</header>      
 
</div>


<div align="center"  > 

<br>
<form name='formulario' id='formulario' method='post' action='incluirfacturacionrubro.php' target='_self' enctype="multipart/form-data"> 

<table    width="1200px"> 

<tr > 
<td class="text-center">
    <?php
        
        $tipofacturacion=$_GET['tipofacturacion'];
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
         <input type="hidden" name="TIPOFACTURACION" value="<?php echo $tipofacturacion; ?> ">  

</td>
</tr>

<tr>
  <td class="text-center"><h2>Facturas Cargadas</h2>

   <select>
      <?php


          echo "<meta charset='utf-8'>";
          $i = 0;
          $tmp[] = "";
          include ("php/connect.php");
          $sql="SELECT * from facturacion 
          where 
          MESFACTURACION = $mes and ANOFACTURACION = $ano order by CODIGOFACTURACION";
          $result=mysqli_query($mysqli,$sql);
          while($mostrar=mysqli_fetch_array($result))
          {     

                  $aaa = $mostrar['CODIGOFACTURACION'];

                  $sql1="SELECT * from descripcionfacturas where CODIGOFACTURA = $aaa  ";
                  $result1=mysqli_query($mysqli,$sql1); 
                  while($mostrar1=mysqli_fetch_array($result1))
                  {
                    $bbb = $mostrar1['DESCRIPCIONFACTURA'];
                  }

                  $ccc = $aaa." ".$bbb;
                  $tmp[$i] = $aaa;
                  $i++;
                  echo '<option  value="'.$ccc.'">'.$ccc.'</option>';
          }
      ?>
    </select> 
 </td>      
</tr>

<tr>

  <td class="text-center"><h2> Factura a Carga</h2>
    <select name="CODIGOFACTURA" id="selec" required>  

      <option value="">Seleccione:</option>  
      <?php
                  $x = 0;

                  $sql="SELECT * from descripcionfacturas where TIPOFACTURACION = $tipofacturacion order by CODIGOFACTURA ";
                  $result=mysqli_query($mysqli,$sql); 
                  while($mostrar=mysqli_fetch_array($result))
                  {

                       $array2[$x] = $mostrar['CODIGOFACTURA'];
                       $x++;
                       /* echo '<option  value="'.$mostrar['CODIGOFACTURA'].".".$mostrar['DESCRIPCIONFACTURA'].'">'.$mostrar['DESCRIPCIONFACTURA'].'</option>';*/
                  }

               /*     print_r($array2); 
                    echo "<br><br><br>";*/
                    $totalarray2 = count($array2);
                /*    echo " totalarray2 ".$totalarray2; echo "<br><br>";*/
                    
                    if ( is_null($tmp) )
                    {
                                              echo "<br><br><br>";
                    $totaltmp = 0;
               /*     echo " totaltmp ".$totaltmp; echo "<br><br>";*/
                    }

                                          
               /*     print_r($tmp); 
                    echo "<br><br><br>";*/
                    $totaltmp = count($tmp);
               /*     echo " totaltmp ".$totaltmp; echo "<br><br>";*/

                    $resultado = array_diff($array2, $tmp) ;
                   
                /*    print_r($resultado); echo "<br><br><br>";*/
                    $totalresultado = count($resultado);
                /* echo " totalresultado ".$totalresultado; echo "<br><br>";*/

                /* print_r(array_values($resultado)[0]);echo "<br><br>"; */

                  for ($a=0; $a <= $totalresultado-1  ; $a++) 
                  { 
                                                                   
                  /*    echo " codigofactura ".$a; */
                      $codigofactura = (array_values($resultado)[$a]); 

                      $sql="SELECT * from descripcionfacturas where TIPOFACTURACION = $tipofacturacion and CODIGOFACTURA = $codigofactura";
                      $result=mysqli_query($mysqli,$sql);
                      while($mostrar=mysqli_fetch_array($result))
                      {     

                            $aaa = $mostrar['CODIGOFACTURA'];
                            $bbb = $mostrar['DESCRIPCIONFACTURA'];
                            $ccc = $aaa." ".$bbb;
                          
                        echo '<option  value="'.$ccc.'">'.$ccc.'</option>';
                      }
                  } 
                  
    ?>
   </select> 



  </td>



  </tr>
  
      
  <tr>
  <td class="text-center"><h2>Monto de la Factura a pagar</h2>

          
           <input type="text" name="MONTOCFACTURA" id="MONTOFACTURA" title="Este concepto es OBLIGATORIO, si el MONTO ES EXACTO se coloca 1000 sin decimales, o con decimales 1234,50" onChange="validarSiNumero(this.value);" required />
        
      </td>
        </tr>
 
 
 
    <tr>
        <td>      
            <input type="hidden" name="ss" />
        </td>
    </tr>
 <tr>
<tr>            
    <td class="text-center">  <br>
      <input type="submit" value="Cargar la Factura"  >
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
