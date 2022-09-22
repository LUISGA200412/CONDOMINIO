<?php
	require_once "../php/connect.php";
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$email=$_POST['email'];
	$clave=md5($_POST['clave']);
	$query="INSERT INTO usuario(Nombre,Apellido,Email,Clave) VALUES('$nombre','$apellido','$email','$clave')";
	if($mysqli->query($query)){
		echo "Datos guardados";
	}else{
		echo "Ocurrio un error";
	}