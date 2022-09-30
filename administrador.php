<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sayecito</title>
 

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->

 


</head>

<body>
      
  <!-- Header -->
  <header id="header">

    <div class="container">

      <h3 align="center">
          <a href="index.php">Regresar al Menu Principal</a>
      </h3>

    </div>
    
  </header>


  &nbsp;&nbsp;&nbsp;
<section class="features" id="features">
    <div class="container">
      <h2 class="text-center">
          Administrar las Base de Datos
      </h2>

      <div class="row">
        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-database"></span>
              </div>
            </div>

            <div>
              <h3> 
                  <?php
                    $cedula=$_GET['cedula'];
                    $email=$_GET['email'];

                    echo "<A href='modificarpropietario.php?cedula=$cedula&email=$email'> Propietarios</A>";
                  ?>
                </h3>

                <p>
                  Aqui se encontrara toda la información necesaria de cada propietario o inquilino en el edificio.
                </p>
            </div>
          </div>
        </div>

        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-plane"></span>
              </div>
            </div>

            <div>
              <h3>
                  <?php                 
                    $cedula=$_GET['cedula']; 
                        echo "<A href='tablafacturacion.php?cedula=$cedula&email=$email'>Facturas Pagadas </A>";
                  ?>
              </h3>

              <p>
                Permite cargar las facturas de gastos que genero el edificio, en ella se encontrara la información de todos los gastos facturados y cancelados para una fecha determinada.
              </p>
            </div>
          </div>
        </div>


        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-car"></span>
              </div>
            </div>

            <div>
              <h3>
                  <?php            
                    $cedula=$_GET['cedula'];
                    echo "<A href='tablafacturas.php?cedula=$cedula&email=$email'> Facturas </A>";
                  ?>
              </h3>

              <p>
                Contiene la información de cada rubro o concepto por los cuales se realizaran y cancelaran los pagos de gastos del edificio.
              </p>
            </div>
          </div>
        </div>

        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-envelope"></span>
              </div>
            </div>

            <div>
              <h3>
                  <?php            
                    $cedula=$_GET['cedula'];
                    echo "<A href='./fpdf/generapdf.php?cedula=$cedula&email=$email'> Generar Recibo de Pago de Condominio </A>";
                  ?>
              </h3>

              <p>
                Esta opción como se expresa, creara el recibo de condominio a cancelar por cada propietario, en ella podra visualizarce, cada uno de los rubros que fueron pagados por la administracion de este edificio, asì como el mosto a cancelar por cada propietario, este factura se generara en formato pdf.
              </p>
            </div>
          </div>
        </div>

          <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-plane"></span>
              </div>
            </div>

            
              <h6>
                  <?php            
                    $cedula=$_GET['cedula'];
                              $cont = 0;
                              $the_array = Array(); 
                              $handle = opendir('./fpdf/RECIBOSDEPAGO'); 
                              while (false !== ($file = readdir($handle))) 
                              { 
                                if ($file != "." && $file != "..") 
                                { 
                                  $cont ++;
                                  $the_array[] = $file; 
                                } 
                              } 
                              
                              closedir($handle);

                              if ($cont > 0) {
                                  sort ($the_array); 
                                  $xx = end( $the_array );
                                  echo "<b>";
                                  echo "<A style='color: red' target='_blank' href='./fpdf/RECIBOSDEPAGO/$xx'>Ver el Ultimo Recibo de Pago Procesado y no Cerrado</A><br><br>"; 

                               }        

                    echo "<A style='color: green' href='./fpdf/finalizarcarga.php?cedula=$cedula&email=$email'> Cerrar la carga de Pagos  </A> <br><br>";
                    echo "<A style='color: orange' href='./fpdf/verrecibosgenerados.php?cedula=$cedula&email=$email'>Ver Todos Los Recibos Generados </A><br><br>";
                    echo "Envio de correos a Propietarios";

                  ?>
              </h6>

          
          </div>
        </div>
  </section>
  <?php include("footer.php") ?>

</body>
</html>