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
  function validarSiNumero(numero){
    if (!/^[0-9]+([.][0-9]+)?$/.test(numero))
      alert("El valor " + numero + " no es un número");
  }

// [0-9,]+[^.]
//  ^[0-9]+([,][0-9]+)?$
</script>




</head> 
<body class="hold-transition skin-red layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   


<div class="content-wrapper">
      <div class="container">

<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 

  <!-- Header -->
  <header id="header">

 
    <h2 align="center" ><b>
            <?php
              
              include ("conexion.php");
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
      </b></h2>

     
  </header>      


    </div>
 

  <div align="center"  > 
   

  <form name='formulario' id='formulario' method='post' action='tablafacturacion1.php' target='_self' enctype="multipart/form-data"> 

  <!--<table border="1" cellspacing="20" cellpadding="10" width="800"> -->
  <table   width="800"> 

  <tr >
    <td align="center">
        <?php
            
            $cedula=$_GET['cedula'];
            $email=$_GET['email'];


            $session['cedula'] = $cedula;

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
        <h5>
          <strong>
             Año a cargar &nbsp;&nbsp;&nbsp;
             <input type="text" value="<?php echo $ano; ?> " disabled size="3" maxlength="3" >  
             &nbsp;&nbsp;&nbsp; Mes a cargar &nbsp;&nbsp;&nbsp; <input type="text" value="<?php echo $mes; ?> " disabled size="2" maxlength="2">
             <input type="hidden" name="MES" value="<?php echo $mes; ?> "> 
             <input type="hidden" name="ANO" value="<?php echo $ano; ?> ">  
          </strong>
        </h5>
    </td>
  </tr>
 
    <tr>
      <td>
        <h5>
          <strong>
                   Facturas ya Cargadas&nbsp;&nbsp;&nbsp;

       <select name="CODIGOFACTURACION" id="selec">
          <?php
              echo "<meta charset='utf-8'>";
              $i = 0;
              $tmp[] = "";
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
                
                      echo '<option  value="'.$ccc.'">'.$ccc.'</option>';
              }
          ?>
        </select> 
          </strong>
        </h5>
     </td>      
    </tr>

    <tr>            
        <td class="text-center">  
          <br>
          <input type="submit" value="Cargar la Factura"  >
         </td>
      <input type="hidden" name="cedula" value="<?php echo $cedula; ?> "> 
      <input type="hidden" name="email" value="<?php echo $email; ?> ">
  

 
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