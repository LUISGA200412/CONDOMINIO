<?php	
	
	$mysqli= new mysqli("localhost", "root", "", "sayecito");
	if(mysqli_connect_errno()){
		echo "Este sitio esta presentando problemas";
	}

/*$conexion=mysqli_connect("localhost", "root", "", "sayecito") or die("Problemas con la base de datos seleccionada");*/

?>