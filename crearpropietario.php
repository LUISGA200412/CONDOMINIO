<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Main Stylesheet File -->
  <link href="estilo.css" rel="stylesheet">

    <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">

</head> 
<body> 


	  <header id="header">
    <div class="container">


      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="crearpropietario.html">Regresar al Menu Anterior</a></li>

        </ul>
      </nav>

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>

    </div>
  </header>



 <div align="center">
<h2>
<?php

$apartamento = $_POST['apartamento'];
$piso = $_POST['pisso'];



if ($piso > 0)

{ 

		//include ("conexion.php");

//		$sql="SELECT * from apartamentos order by PISO";
//		$result=mysqli_query($conexion,$sql);

//Conexion con la base
//mysql_connect("localhost","tu_user","tu_password"); 

//selección de la base de datos con la que vamos a trabajar 
//mysql_select_db("mi_base_datos"); 




    $conexion=mysql_connect('localhost','root','')or die("Problemas con la base de datos seleccionada");
    $seleccion_bd=mysql_select_db('sayecito') or die("Problemas con la base de datos seleccionada");

//Ejecucion de la sentencia SQL
	mysql_query("insert into apartamentos (PISO,APARTAMENTO) values ( '$piso' , '$apartamento'  ) ");

	echo "<h1><div align='center' style='color: gray'>El Propietario ha sido incluido </div></h1>";
	echo "<div align='center'><a href='listapropietarios.php'>Visualizar el contenido de la tabla</a></div>";
}
else
{ 
	echo "<h1><div align='center'>error regrese</div></h1>";
	echo "<div align='center'><a href='lectura.php'>Visualizar el contenido de la base</a></div>";
}

?>
</h2>
</div>
</BODY>
</HTML>