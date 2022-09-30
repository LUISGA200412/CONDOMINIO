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


<script>
  
  function modificar(cod) 
  {

    window.location = "modtablapropietario.php?parametro="+cod;

  }

</script>
</head> 
<body> 


 <!-- Header -->
  <header id="header">

    <div class="container">

      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<a href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</a>";
             echo "<br>"; 
 
                  echo "<h5 > 
                            <A style='color:navy'><b> Pulse </b> </A>
                            <A style='color:red' href='incluirentablafacturas.php?cedula=$cedula&email=$email'><b>  AQUI </b> </A> 
                            <A style='color:navy'> <b> si desea  Incluir mas  descripciònes de facturas <b></A>
                        </h5>" ;

                ?>
      </b></h2>

    </div>
    
  </header> 

<table border="1" align="center">
    
      <tr>
      <td>Codigo Factura</td> 
      <td>Descripción de la Factura</td> 
            <td colspan="2">Acción</td>
      </tr>
   
    <tbody>
      <?php
      
      $cedula               =$_GET['cedula'];
      $email               =$_GET['email'];
        include ("php/connect.php");
        $query="SELECT * FROM descripcionfacturas ";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
   
      <td>".$fila['CODIGOFACTURA']."</td>

      <td>".$fila['DESCRIPCIONFACTURA']."</td>
 



            <td>
              

            <a href='modtablafacturas.php?parametro=".$fila['CODIGOFACTURA']."&cedula=$cedula&email=$email'>Modificar</a></td> 
            
   
          </tr>";
        }
          

      ?>      
    </tbody>
  </table>
 <?php include("footer.php") ?>
</body> 
</html> 