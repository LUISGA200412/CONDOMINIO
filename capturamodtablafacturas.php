 

<?php
 


/*print_r($_POST);*/
 
    $cedula=$_POST['cedula'];
    $email=$_POST['email'];

    $codfacturas=$_POST["codfacturas"];
    $desfacturas=strtoupper($_POST["desfacturas"]);
   

     include ("php/connect.php");

    $sql="UPDATE descripcionfacturas set

    DESCRIPCIONFACTURA     = '$desfacturas'
                                                     
    where CODIGOFACTURA = $codfacturas ";

     if (mysqli_query($mysqli, $sql)) {
     
              /*echo "<h3>
                  <A href='modificarpropietario.php'> Modificar un Propietario </A>
                </h3>";*/
                

                echo "<br><br><br><br><br><br>";
                echo "<center style='color:#e77b16'><h1>El Registro ha sido Modificado</h1>";   
                echo "<center style='color:#e77b16'>";

                echo "<form id='form1' name='form1' method='post' action=tablafacturas.php?cedula=$cedula&email=$email'>";
                
                echo "<input type='submit' value='Regresar al Menu Anterior'>";
                echo "</form>";

} else {
    echo "Error updating record: " . mysqli_error($conexion);
}
?>