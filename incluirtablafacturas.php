 
<?php
                                
     include ("php/connect.php");

 
$cedula               =$_GET['cedula'];
$email                =$_GET['email'];
$descripcionfacturas  =strtoupper($_GET['desfacturas']);
$codigofactura        =strtoupper($_GET['codfacturas']); 

            $sql="INSERT INTO descripcionfacturas (CODIGOFACTURA, DESCRIPCIONFACTURA) VALUES ( '$codigofactura','$descripcionfacturas'); ";
      

if ($mysqli->query($sql) === FALSE) {

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>Error Cargando el Registro,,,, este puede estar duplicado... Corrija</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturass.php?cedula=$cedula&email=$email'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";

}
else
{
                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Incluido con exito</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action='tablafacturas.php?cedula=$cedula&email=$email'>";
                
                echo "<input type='submit' value='Continuar'>";
                echo "</form>";

}

$mysqli->close();

?>

 