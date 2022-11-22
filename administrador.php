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

<body>
      
  <!-- Header -->
 

 

      <h3 align="center" style="margin-top: 0;">

      <?php
                    $cedula=$_GET['cedula'];
                    $email=$_GET['email'];

                    echo "<a href='Principal.php?cedula=$cedula&email=$email'> Regresar al Menu Principal</a>";
                  ?>
        
      </h3>

 
    <h2 class="text-center">
          Administrar las Base de Datos
      </h2>
 

  <div style="  margin-top:none;">
  <div class="container1 grid-notas">

          <div class="nota1 text-center">
                  <h4>
                   <?php
                    $cedula=$_GET['cedula'];
                    $email=$_GET['email'];

                    echo "<A   href='modificarpropietario.php?cedula=$cedula&email=$email'>Modificar Informaciòn Propietarios</A>";
                    ?>
                  </h4>

                  <p>
                      En este link se podra encontrar, toda la información necesaria de cada <b>PROPIETARIO O INQUILINO</b> que recide en Nuestra Residencia.
                  </p>
                  <h4>
                    <?php 
                    echo "<A href='CargarPropietario.php?cedula=$cedula&email=$email'>Cargar Foto Propietarios</A>";
                    ?>
                  </h4>
                  <p>
                     Este link Permitira como su nombre lo indica, <b>CARGAR LA FOTO DEL PROPIETARIO O INQUILINO</b> que habita en Nuestra Residencia.
                  </p>
                  
 

          </div>

          <div class="nota2 text-center">
              <h4>
                  <?php                 
                    $cedula=$_GET['cedula']; 
                        echo "<A href='tablafacturacion.php?cedula=$cedula&email=$email'>Facturas Pagadas </A>";
                  ?>
              </h4>

              <p>
                Permite cargar las facturas de gastos que genero el edificio, en ella se encontrara la información de todos los gastos facturados y cancelados para una fecha determinada.
              </p>
              <h4>
                    <?php 
                            include ("conexion.php");

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



                    echo "<A href='CargarFotoFactura.php?cedula=$cedula&email=$email&ano=$ano&mes=$mes'>Cargar Foto Facturas</A>";
                    ?>
                  </h4>

                  <p>
                     Este link Permitira como su nombre lo indica, <b>CARGAR FOTO DE LAS FACTURAS</b> pagadas.
                  </p>
          </div> 

          <div class="nota3 text-center">
              <h4>
                  <?php            
                    $cedula=$_GET['cedula'];
                    echo "<A href='tablafacturas.php?cedula=$cedula&email=$email'> Facturas Mensuales</A>";
                  ?>
              </h4>

              <p>
                Contiene la denominaciòn de la factura que sera pagada como gastos del edificio.
              </p>
              <h4>
                    <?php 
                            include ("conexion.php");

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



                    echo "<A style='color: red' href='CargarRubrosCondominioEspeciales.php?cedula=$cedula&email=$email&ano=$ano&mes=$mes'><b>Facturas Especiales </A>";
                    ?>
                  </h4>
                  <p>
                      Contiene la denominaciòn de la factura especiales del recibo de condominio que no generan<b style='color: GREEN' > CARGOS EXTRAS EN EL FONDO DE RESERVA/EMERGENCIA</b>.
                                      
                  </p>







          </div> 

  </div>  
</div>


<div style="  margin-top:none;">
  <div class="container1 grid-notas">

          <div class="nota2 text-center">
                  <h4>
                    <?php 
                            include ("conexion.php");

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



                    echo "<A href='CargarRubrosCondominio.php?tipofacturacion=0&cedula=$cedula&email=$email&ano=$ano&mes=$mes'>Cargar Monto Mensual a Pagar del Condominio</A>";
                    ?>
                  </h4>
                  <p>
                      Este opciòn permite, cargar los <b>Montos de las rubros del recibo de condominio</b>,
                                      
                  </p>
                  
                  <h4>
                      <?php   
                       echo "<A href='CargarRubrosCondominio.php?tipofacturacion=1&cedula=$cedula&email=$email&ano=$ano&mes=$mes'>Cargar Rubros del Condominio</A>";
                       ?>

                  </h4>
                  <p>
                  Este opciòn permite, cargar los <b>Montos Especiales de las rubros del recibo de condominio</b>
                                      
                  </p>
                  <h4 style='color:blue;' >
                 
                      <?php            
                        $cedula=$_GET['cedula'];

                        //echo "<A href='./fpdf/generapdf.php?cedula=$cedula&email=$email'> Generar el Recibo de Condominio </A>";

                        echo "
                        <form action='./fpdf/generapdf.php?cedula=$cedula&email=$email' method='post' enctype='multipart/form-data'>
                      
                            <table>
                              <tr>
                                <td class='text-center'>
                                    
                                      <b>Generar el Recibo de Condominio</b>
                                  
                                </td>
                              </tr>
                                <tr> 
                                  <td class='text-center'>
 
                                        Tasa del BCV 
                                        <input type='text' name='tasa' title='Tasa del bcv, la tasa  se coloca asi 1234.50' onChange='validarSiNumero(this.value);' required />
                                        <input type='submit' name='submit' value='Cargar'/>
                                    
                                  </td>
                              </tr>
                            </table>
                                
                        </form>";
                      ?>
                  </h4>

                  <p>
                    Esta opción permitira, observar el <b>recibo de condominio</b>.
                  </p>
 
           </div>

          <div class="nota1 text-center">

                <h2>
                  <strong>Otras Funcionalidades</strong>     
           
                </h2>

              <h4>
                  <?php
                     echo "<br><A style='color: green' href='finalizarcarga.php?cedula=$cedula&email=$email'> Cerrar la carga de Pagos  </A> <br>";
                     echo "<br><A style='color: magenta' href='correo.php?cedula=$cedula&email=$email'>Envio de correos a Propietarios</A><br>";
                  ?>
            
              </h4>
          </div> 


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