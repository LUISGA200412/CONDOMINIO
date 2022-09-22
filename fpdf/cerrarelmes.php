<?php
 
    $cedula=$_GET['cedula'];
    $mes=$_GET['mes'];
 
   
ECHO $mes;
 include ("../php/connect.php");

    $sql="UPDATE facturacion set

    CIERREMES     = 1
                                                     
    where MESFACTURACION = $mes ";

     if (mysqli_query($mysqli, $sql)) {
 
              
                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Mes ha sido cerrado</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='../administrador.php?cedula=$cedula'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";

} else {
    echo "Error updating record: " . mysqli_error($mysqli);
}
?>