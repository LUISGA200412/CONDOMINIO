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
              //print_r($_POST); ECHO "<BR>";


              $MESFACTURA           = $_POST["MES"];
              $ANOFACTURA           = $_POST["ANO"];
              $COD                  = $_POST["CODIGOFACTURACION"];

              $unmail = explode(" ", $COD);               
              $CODIGOFACTURA = $unmail[0]; 

              $cedula        = $_POST["cedula"];
              $email         = $_POST["email"];

              include ("conexion.php");
 

              echo "<A href='tablafacturacion.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
      </b></h2>

 
    
  </header>      

  <div class="text-center" style="color: red;">
    <h1 >
        <strong>
         <?php           
            $sql="SELECT * from descripcionfacturas where CODIGOFACTURA = $CODIGOFACTURA";
            $result=mysqli_query($mysqli,$sql);
            while($mostrar=mysqli_fetch_array($result))
            {     
              echo "Se Carga la Factura : ".$mostrar['DESCRIPCIONFACTURA'];                           
            }
        ?>
        </strong>
     </h1>
  </div>

  <div class="text-center">

        <form name='formulario' id='formulario' method='post' action='incluirfacturacion.php' target='_self' enctype="multipart/form-data"> 

        <table border="0" width="1190"> 

        <tr>
            <td>
                <?php           
                    $sql1="SELECT * from facturacion where MESFACTURACION = $MESFACTURA AND 
                    ANOFACTURACION = $ANOFACTURA AND CODIGOFACTURACION = $CODIGOFACTURA";
                    $result1=mysqli_query($mysqli,$sql1);
                    while($mostrar1=mysqli_fetch_array($result1))
                    {     
                        $fechapago = $mostrar1['FECHAFACTURACION'];
                        $rif = $mostrar1['RIFFACTURACION'];   
                        $numerofactura = $mostrar1['NUMEROFACTURACION'];    
                        $nombrefactura = $mostrar1['NOMBREFACTURACION']; 
                        $descripcionfactura = $mostrar1['DESCRIPCIONFACTURACION'];                           
                        $montofactura = $mostrar1['MONTOFACTURACION'];    
                        }
                ?>
                <h5>
                    <strong>
                Fecha de la Factura a Pagar &nbsp;&nbsp;&nbsp;
                <input type="date" value="<?php echo $fechapago; ?>" name="FECHAFACTURA" id="FECHAFACTURA" size="10" maxlength="10" required/> 
                &nbsp;&nbsp;&nbsp; Numero del RIF de la Factura &nbsp;&nbsp;&nbsp;
                <input type="text" value="<?php echo $rif; ?>" name="RIFFACTURA" id="RIF" size="10" maxlength="10" title="Un Número de RIF es requerido de no poseerlo coloque ( SIN RIF )" required />           
                &nbsp;&nbsp;&nbsp; Numero de la Factura &nbsp;&nbsp;&nbsp;
                <input type="text" value="<?php echo $numerofactura; ?>" name="NUMEROFACTURA" id="NUMEROFACTURA" size="10" maxlength="10" title="Un Número de Factura es requerido de no poseerlo coloque ( S/N )" required />           
                    </strong>
                </h5>
            </td>
        </tr>
 
 
       <tr>
            <td>
                <h5>
                    <strong>
                    Factura a Nombre de &nbsp;&nbsp;&nbsp;
                    <input type="text" value="<?php echo $nombrefactura; ?>" name="NOMBREFACTURA" id="NOMFACTURA" size="50" title="Nombre de la persona a la que se le paga es requerido no poseerlo coloque ( SIN NOMBRE )" required />           
                    &nbsp;&nbsp;&nbsp; Descripción de la Factura a Pagar &nbsp;&nbsp;&nbsp;
                    <input type="text" value="<?php echo $descripcionfactura; ?>" name="DESCRIPCIONFACTURA" id="DESCFACTURA"  size="50" title="Una descripcion de lo que se esta pagando es requerido de no poseerlo coloque ( SIN DESCRIPCION )" required />           
                    </strong>
                </h5>
            </td>
        </tr>

        <tr>
            <td class="text-center">
            </td>
        </tr>

        <tr>
            <td> 
                <h5>
                    <strong>
                    Monto de la Factura a pagar &nbsp;&nbsp;&nbsp;
                    <input type="text" value="<?php echo $montofactura; ?>" name="MONTOCFACTURA" id="MONTOFACTURA" title="Este concepto es OBLIGATORIO, si el MONTO ES EXACTO se coloca 1000 sin decimales, o con decimales 1234,50" onChange="validarSiNumero(this.value);" required />
                    </strong>  
                </h5>        
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="hidden" name="ss" />
            </td>
        </tr>
        
        <tr>
            <td>  
                <br>
                <input type="submit" value="Cargar la Factura"  >
                <input type="hidden" name="CEDULAFACTURA" value="<?php echo $cedula; ?> "> 
                <input type="hidden" name="EMAILFACTURA" value="<?php echo $email; ?> "> 
                <input type="hidden" name="MES" value="<?php echo $MESFACTURA; ?> "> 
                <input type="hidden" name="ANO" value="<?php echo $ANOFACTURA; ?> "> 
                <input type="hidden" name="CODIGOFACTURA" value="<?php echo $CODIGOFACTURA; ?> "> 


            </td>
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