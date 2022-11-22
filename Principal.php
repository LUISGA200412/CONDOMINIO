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
<?php
	include("BarraNavegacion.php");
?>
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  
<div class="content-wrapper">
      <div class="container">
  
<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 



        <div>
           <marquee direction="left"  scrolldelay="1" scrollamount="10" behaviour="alternate" loop="0" onmouseover="stop();" onmouseout="start();" >
              <h5 style="color: copper;">
                <?php
                       echo "<strong>".date('d-m-Y')." -  VECINOS: SU SALUD ES IMPORTANTE CUÍDELA, PERMANEZCA EN CASA NO SALGA SI NO ES NECESARIO USE TAPA BOCA. PREVENIR ES VIVIR &nbsp; &nbsp; &nbsp; &nbsp;";
                ?>
              </h5>
            </marquee>     
        </div>
        <span class="ir-arriba fa  fa-arrow-up"></span>
         <div style="  margin-top:none;">
          <div class="container1 grid-notas">
              
            <div>
                  
            </div>

            <div class="nota" >

                  <?php
                    include ("php/connect.php");
                    
                    $email  = $_GET['email'];
                    $cedula = $_GET['cedula'];
                  
                  //echo $email." ".$cedula;
                  
                  if(empty($cedula) or empty($email))
                  {
                    echo "<script>alert('Email y/o Clave No Valida.');
                    location.href ='index.php';
                    </script>"; 
                  }
                  
                 /* $sql1="SELECT NOMBRE AS TT,APELLIDO FROM apartamentos WHERE CORREOA='$email' AND CEDULA='$cedula'";
                  $result1=mysqli_query($mysqli,$sql1);
                  while($mostrar1=mysqli_fetch_array($result1))
                  {
                    $nombre = $mostrar1['TT'];
                    $apellido = $mostrar1['APELLIDO'];
                  }
                  
                  if( empty($nombre))
                  {
                    echo "<script>alert('usuario');
                    location.href ='index.php';
                    </script>";
                  }
                */

                  $query="SELECT * FROM apartamentos WHERE CORREOA='$email' AND CEDULA='$cedula'";
                  $consulta2=$mysqli->query($query);
                  if($consulta2->num_rows>0)
                  {
                    $fila=$consulta2->fetch_array(MYSQLI_ASSOC);
                      
                    $_SESSION['user']=$fila['NOMBRE']." ".$fila['APELLIDO'];
 
                    $_SESSION['verificar']=true;
                    $_SESSION['email']=$fila['CORREOA'];
                    $_SESSION['cedula']=$fila['CEDULA'];
                    $_SESSION['piso']=$fila['PISO'];
                    $_SESSION['apartamento']=$fila['APARTAMENTO'];
                    $foto = $fila['FOTOPROPIETARIO'];
                   

                       if ($_SESSION['cedula']==3718104 or $_SESSION['cedula']==6821253)
                      {	
                        echo "<h2  class='text-center'>";
                        echo $_SESSION['user'];
                        echo "</h2>";
                                    
                        echo "<h3 class='text-center'>Ingresar al Modulo Administrador
                          <A HREF='administrador.php?cedula=$cedula&email=$email' >Pulsa Aqui</A>
                          </h3>";                                            
                      } 
                      else
                      { 
                          echo "<h2  class='text-center'>";
                          echo $_SESSION['user'];
                          echo "</h2>";
                      }
                  }
                  else 
                  { 
                    

                     $query="SELECT * FROM apartamentos WHERE  CEDULA=6821253";
                    $consulta2=$mysqli->query($query);
                  
                     $fila=$consulta2->fetch_array(MYSQLI_ASSOC);
 
                      $nom=$fila['NOMBRE']." ".$fila['APELLIDO'];
                      $cor=$fila['CORREOA'];
                      $tel=$fila['TELEFONOCA'];
                      $tel1=$fila['TELEFONOCE'];

                    echo 
                      "<script>            
                        alert
                        (
                      
                          'AUN NO ESTAS REGISTRADO COMUNICATE CON EL ADMINISTRADOR DEL EDIFICIO $nom por el email : $cor o por el telefono : $tel o el $tel1'
        
                        );
                        
                        location.href ='index.php';
                      </script>
                      "; 
                    
                  }

                  ?> 
            </div>

          </div>  
        </div>
              
        <div>     
          <div>
            <?php
             echo '<img class="profile-user-img img-responsive img-circle"
             src = "data:image/png;base64,' . base64_encode($foto) . '" alt="User Image"><br>';

            ?>
          </div>
        </div>
                    
        <div style="margin-top:5px;">
          <div class="container1 grid-notas5">

              <div>
                <table>
                  <tr>
                    <td style="padding: 10px;" >
                        <img src="img/imagen01.jpg" width="170px" height="170px"/>
                     </td>
                    <td style="padding: 10px; " >
                        <b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, dolorum recusandae. Pariatur vitae neque voluptatem molestias sapiente unde libero et?
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 1px;" colspan="3" ALIGN="CENTER">
                        <?php
                         echo "<a href=noticia01.php?cedula=$cedula&email=$email>Ver Noticia</a>";
                        ?>
                    </td>
                  </tr>
                </table>
              </div>
           
              <div>
                <table>
                  <tr>
                    <td style="padding: 10px;" >
                        <img src="img/1.png" width="170px" height="170px"/>
                     </td>
                    <td style="padding: 10px; " >
                        <b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, dolorum recusandae. Pariatur vitae neque voluptatem molestias sapiente unde libero et?
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 1px;" colspan="3" ALIGN="CENTER">
                        <?php
                         echo "<a href=noticia02.php?cedula=$cedula&email=$email>Ver Noticia</a>";
                        ?>
                    </td>
                  </tr>
                </table>
              </div>

 
 
   
 
          </div>  
        </div>
  <div>
    <?php
    include("fotovideo.php");
    ?>
  </div>

  <div>    
    <?php
      include("acordeon.php"); 
      ?>
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
<script src="acordeon.js"></script>
<script src="arriba.js"></script>
</body>
</html>
