<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Main Stylesheet File -->
  <link href="../estilo.css" rel="stylesheet">

    <!-- Favicon -->
  <link href="../img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../estilo.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="tcal.css" />
  <script type="text/javascript" src="tcal.js"></script> 

</head> 
<body> 

    <header id="header">
    <div class="container">


      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="../administrador.html">Regresar al Menu Anterior</a></li>

        </ul>
      </nav>
      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>

    </div>
  </header>

  <div align="center"  > 
   
<h2 style="color: red" >Carga de Registros en la Tabla de Facturacion</h2>

  <form name='formulario' id='formulario' method='post' action='incluirfacturacion.php' target='_self' enctype="multipart/form-data"> 

  <table border="1" cellspacing="20" cellpadding="10" border="3"> 

  <tr >
    <td>
      Registro de la Factura del mes  <input type="month" name="MESFACTURA" value="2018-12"  min="2018-01" max="2030-12" >
    </td>
  </tr>
 

 

 
    <tr>

      <td > descripcion de la factura
      <select>
        <option value="0">Seleccione:</option>
        <?php
 

            include ("../conexion.php");

            $sql="SELECT * from desfacturas order by CODFACTURA";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result))
            {
       
                echo '<option value="'.$mostrar[CODFACTURA].'">'.$mostrar[DESFACTURA].'</option>';
            }
        ?>
      </select>
      </td>
      </tr>
        <tr>
      <td>
          
        <!--Fecha Facturación <input type="text" name="FECHFACTURA" class="tcal" id="FECHAFACTURA" /></div> -->
        Fecha Facturación <input type="date" name="FECHFACTURA" id="FECHAFACTURA" />
        
      </td>
        </tr>
          <tr>
      <td>
          
          Numero RIF <input type="text" name="RIF" id="RIF" /></div>
        
      </td>
  </tr>
    <tr>
      <td>
          
          Numero de Factura <input type="text" name="NUMFACTURA" id="NUMFACTURA" /></div>
        
      </td>
    </tr>
 
  
 

 
    <tr>
      <td>
          
          Nombre de la factura  <input type="text" name="NOMFACTURA" id="NOMFACTURA" /></div>
        
      </td>
        </tr>
          <tr>
      <td>
          
          Descripción de la Factura <input type="text" name="DESCFACTURA" id="DESCFACTURA" /></div>
        
      </td>
        </tr>
          <tr>
      <td>

          
          Monto de la Factura <input type="Numero" name="MONTOCFACTURA" id="MONTOFACTURA" /></div>
        
      </td>
        </tr>
          <tr>
      <td>
          
          Cedula del Autorizado <input type="Numero" name="CEDULA" value="<?php  echo "cedula";  ?>"   /></div>
        
      </td>
    </tr>
 
        <tr>
      <td ><input type="submit" value="Guardar"></td>
    </tr>

  </table>

 

 


  </table>

   </form>
  </div>
 


</body> 
</html> 