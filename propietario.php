<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/style.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">

<title>Propietario</title>
</head>


<body  background="cover.jpg"><center>

<div >

<?php 
 
/* include ("conexion.php");

$buscar=$_POST['cedula'];

if (!$buscar)
{ 
	$buscar=0;
}
 
if (!isset($buscar)){ 

echo "

</html>
</body>
\n"; 
exit; 
} 


$result = mysqli_query("SELECT NOMBRE FROM apartamentos WHERE CEDULA =$buscar"); 

if ($row = mysql_fetch_array($result)) 
{ */

include ("php/connect.php");

$email=$_POST['email'];
$cedula=$_POST['cedula'];

 

if (!$email)
{ 
	$email=0;
}
if (!$cedula)
{ 
	$cedula=" ";
}

     /*session_start();*/
     $_SESSION['cedula'] = $_POST['cedula'];
 
    /* Si no hay una sesión creada, redireccionar al index. */
    if(empty($_SESSION['cedula'])) { // Recuerda usar corchetes.
        header('Location: index.html');
    } // Recuerda usar corchetes


	$query="SELECT * FROM apartamentos WHERE CORREOA='$email' AND CEDULA='$cedula'";
	$consulta2=$mysqli->query($query);
	if($consulta2->num_rows>=1){
		$fila=$consulta2->fetch_array(MYSQLI_ASSOC);
	    

    
 





		$_SESSION['user']=$fila['NOMBRE']." ".$fila['APELLIDO'];
		$_SESSION['verificar']=true;
		$_SESSION['email']=$fila['CORREOA'];
		$_SESSION['cedula']=$fila['CEDULA'];
		$_SESSION['piso']=$fila['PISO'];
		$_SESSION['apartamento']=$fila['APARTAMENTO'];





	if ($_SESSION['cedula']==3718104 or $_SESSION['cedula']==6821253)
	{	
		echo "<h3 style='color:orange'>";
		echo "Bienvenido Propietario/a " .$_SESSION['user'];
		echo "</h3>";

		echo "<h3 style='color:WHITE'> Para ir al modulo de Administradores pulsa
 			 <A style='color:WHITE' HREF='administrador.php?cedula=$cedula' >AQUI</A></h3>";
		echo "<h3 style='color:WHITE'> Para ir a la Web pulsa
			 <A style='color:WHITE' href='acerca.html'> AQUI </A> </h3>" ;
	}
	else
	{ 
		echo "<h3 style='color:orange'>";
		echo "Bienvenido Propietario/a " .$_SESSION['user'];
		echo "</h3>";		
		echo "<h3 style='color:WHITE'> Para ir a la Web pulsa
			 <A style='color:WHITE' href='acerca.html'> AQUI </A> </h3>" ;
	}
}
else { 

	$query="SELECT * FROM apartamentos WHERE  CEDULA=3718104";
	$consulta2=$mysqli->query($query);
 
		$fila=$consulta2->fetch_array(MYSQLI_ASSOC);
 
		echo "<h3 style='color:white'>AUN NO ESTAS REGISTRADO !</h3>";
		echo "<h3 style='color:white'> COMUNICATE CON EL ADMINISTRADOR DE TU EDIFICIO </h3>";

		echo "<h2 style='color:yellow'>";
		echo $fila['NOMBRE']." ".$fila['APELLIDO'];
		echo "</h2>";
		
		echo "<h2 style='color:BLUE'>";
		echo "Por su Email : ".$fila['CORREOA']." o Por su Telefono ".$fila['TELEFONOCE'];
		echo "</h2>";
 
		echo "<h3>"; 
		echo "<A style='color:yellow' HREF='index.html' > PULSA PARA REGRESAR </A>";
		echo "</h3>";
	 
}


/* 	while ($row = mysql_fetch_array($result)); 
 
} 
else { 
		echo "<h3 style='color:red'>AUN NO ESTAS REGISTRADO !</h3>";
		echo "<h3 style='color:red'> TE PUEDES REGISTRAR <A style='color:WHITE' HREF='registrar.php' > AQUI </A></h3>";
}*/
?> 

</div>

</body>
</html>