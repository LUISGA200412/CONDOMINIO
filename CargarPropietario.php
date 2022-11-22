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
<style>

body{
	 background: #b7dbe2;
}

</style>
</head>

<body class="hold-transition skin-blue layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  
<div class="content-wrapper">
      <div class="container">
  
<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 

 
<section  class="text-center">       
    <div>

        <div>
          <h2>

            <?php
                    /*       print_r($_GET); */

                  $email  = $_GET['email'];
                  $cedula = $_GET['cedula'];
                  
                  echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
                
            ?>
        
          </h2>
        </div>

        <h2  style='color:brown'>
          Bienvenidos al Módulo Cargar Foto de las Facturas canceladas del Mes	
        </h2>

    </div> 

    <div>

        <table style="margin-left: 400px; font-size:24px;">
        <tr>
        
            <td>
              
          <br>       

          <form name='formulario' id='formulario' method='get' action=' CargaFotoPropietarios.php'
          target='_self' enctype="multipart/form-data"> 

          

        <select name="CODIGO" id="selec" required>  

                <option value="">Seleccione Propietario:</option> 

                <?php

                include ("conexion.php");
        

                $sql = "SELECT * FROM apartamentos order by PISO,APARTAMENTO ";
              
                $result=mysqli_query($mysqli,$sql); 
                while($mostrar=mysqli_fetch_array($result))
                {
                      $ced = $mostrar['CEDULA'];
                        $nombre =  utf8_decode($mostrar['NOMBRE'])." ".utf8_decode($mostrar['APELLIDO']);
                        $piso = $mostrar['APARTAMENTO'];


                        $ccc = $piso."   ".$nombre;      
                        echo '<option  value=" '.$piso.'.'.$ced.'.'.$nombre.' ">'.$ccc.'</option>';
                }

                              
                ?>
              </select> 
              <br><br> 
              
                <input type="submit" value="Cargar">
                <input type="hidden" name="cedula" value="<?php echo $cedula; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">

              </form>
          </td>


        </tr>   
        </table>
    </div>
</section>

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
</body>
</html>