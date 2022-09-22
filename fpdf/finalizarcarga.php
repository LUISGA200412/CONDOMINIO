<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="../img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../estilo.css" rel="stylesheet">


</head>

<body>

  <!-- Header -->
  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li>
                <?php
                    session_start();
                    $cedula=$_GET['cedula'];
                    echo "<A href='../administrador.php?cedula=$cedula'>Regresar al Menu Anterior</A>";
                  ?>
          </li>
 
        </ul>
      </nav>
 
  </header>

<div align="center">




<?php
include ("../php/connect.php");

$mysqli->set_charset("utf8");
 
 $query1="SELECT * FROM facturacion WHERE CIERREMES = 0 ";
 $resultado1=$mysqli->query($query1);
 
while($fila11=$resultado1->fetch_array(MYSQLI_ASSOC))
 
{
  
      $mesfacturacion = $fila11['MESFACTURACION'];
      $mescierre = $mesfacturacion;
      if ( $mesfacturacion < 10 )
      {

        $mesfacturacion = "0".$mesfacturacion;
      }
}

if (isset($mesfacturacion)) {
 




    $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes = $mes[($mesfacturacion * 1) -1 ];
    $messalida = "DEL MES ".date($mesfacturacion)." DEL A/O ".date("Y");

echo "<h3 style='color: red'>";
echo "<b>";
echo "<br><br><br><br><br><br>";
echo "ESTE PROCESO CERRARA LA GENERACION DE PAGOS ".$messalida; 
echo "<br><br>";
echo " SI ESTA COMPLETAMENTE SEGURO PULSE ";
echo "<br><br>";


    /*echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');
            location.href ='../contactanos.html';
            </script>";    */
 
  echo "<form action='../fpdf/cerrarelmes.php?cedula=$cedula&mes=$mescierre' method='post'>";

  echo  "<input type='submit' value='Cerrar el Mes'>";
 
  echo "</form>";


 }
else
{
    echo "<script>alert('No Existe Ningun Mes Para Cerrar..... Corrija y carge un mes');
            location.href ='../administrador.php?cedula=$cedula';
             </script>"; 
}
 
?>

</div>


</body>
</html>
