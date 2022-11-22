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
  <header id="header">

 
      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<a href='tablafacturas.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</a>";
            ?>
      </b></h2>
<br>
 
    
  </header> 

  <?php 

 $codfacturas=$_GET["parametro"];
 $cedula=$_GET['cedula'];
 $email=$_GET['email'];

 
 

            include ("php/connect.php");

    $sql="SELECT * from descripcionfacturas where CODIGOFACTURA = $codfacturas  ";
    $result=mysqli_query($mysqli,$sql);

  ?>

  <form action="capturamodtablafacturas.php?cedula=$cedula&email=$email" method="post">

    <table border="4" align="center" width="1000px">
 <thead>
    <tr>
      <td class="text-center">Codigo de la Factura</td> 
     <td class="text-center">Descripción de la Factura</td> 
    </tr>


    <?php foreach ($result as $key => $value)  {?>

    <tr>
     
      <td class="text-center"><?php echo $codfacturas ?></td>
      <td><input type="text" size="100" name="desfacturas" value="<?php echo $value["DESCRIPCIONFACTURA"]; ?>" required></td>
    </tr>
 
    <tr>
       <td class="text-center" colspan="2"><br><input type="submit" value="Guardar"></td>
    </tr>

  <?php } ?>
  </tbody>
    </table>
 
<input type="hidden" name="codfacturas" value="<?php echo $codfacturas; ?>">
<input type="hidden" name="cedula" value="<?php echo $cedula; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">


  </form>

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