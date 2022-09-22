<?php   include("redessociales.php") ?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">




</head> 
<body> 
  <header id="header">

    <div class="container">

      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              echo "<a href='tablafacturas.php?cedula=$cedula'>Regresar al Menu Anterior</a>";
            ?>
      </b></h2>

    </div>
    
  </header> 

  <?php 

 $codfacturas=$_GET["parametro"];
 

 
 

            include ("php/connect.php");

    $sql="SELECT * from descripcionfacturas where CODIGOFACTURA = $codfacturas  ";
    $result=mysqli_query($mysqli,$sql);

  ?>

  <form action="capturamodtablafacturas.php?cedula=$cedula" method="post">

    <table border="4" align="center" width="800">
 <thead>
    <tr>
      <td>Codigo de la Factura</td> 
     <td>Descripción de la Factura</td> 
    </tr>


    <?php foreach ($result as $key => $value)  {?>

    <tr>
     
      <td><?php echo $codfacturas ?></td>
        <td><input type="text" name="desfacturas" value="<?php echo $value["DESCRIPCIONFACTURA"]; ?>" size="50" maxlength="50" required></td>
    </tr>
 
    <tr>
      <td colspan="2"><input type="submit" value="Guardar"></td>
    </tr>

  <?php } ?>
  </tbody>
    </table>
 
<input type="hidden" name="codfacturas" value="<?php echo $codfacturas; ?>">
<input type="hidden" name="cedula" value="<?php echo $cedula; ?>">

  </form>


</body> 
</html> 