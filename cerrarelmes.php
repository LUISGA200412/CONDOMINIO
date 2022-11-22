<?php
 
    $cedula=$_GET['cedula'];
    $email=$_GET['email'];
    $mescierre=$_GET['mes'];
    $anocierre=$_GET['ano'];
 
    include ("conexion.php");

    $total=0;
   
    $query1="SELECT count(*) as total FROM `facturacion` WHERE 
    `ANOFACTURACION`    = $anocierre and
    `MESFACTURACION`    = $mescierre and 
    `FOTOFACTURA`       = ''  ";
    $resultado1=$mysqli->query($query1);
  
    while($fila11=$resultado1->fetch_array(MYSQLI_ASSOC))
  
    {
   
       $total = $fila11['total'];
 
    }
 
if( $total > 0)
{
    echo "<script>alert('NO SE PUEDE CERRAR EL MES,,,, FALTAN FACTURAS POR CARGARLE SU FOTO ');
    location.href ='administrador.php?cedula=$cedula&email=$email';
     </script>"; 
}
else
{
    $sql="UPDATE facturacion set

    CIERREMES     = 1
                                                     
    where MESFACTURACION = $mescierre and ANOFACTURACION = $anocierre ";

     if (mysqli_query($mysqli, $sql)) {
 
              
                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Mes ha sido cerrado</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='administrador.php?cedula=$cedula&email=$email'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";

    } 
    else 
    {
         echo "Error updating record: " . mysqli_error($mysqli);
    }
}
?>