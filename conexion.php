<?php

$mysqli= new mysqli("localhost", "id19614846_thiago2012", 
"Condominio2012*", "id19614846_pwcon");
if(mysqli_connect_errno()){
	echo "Este sitio esta presentando problemas";
}
$mysqli->set_charset("utf8"); 

/*
$mysqli= new mysqli("localhost", "root", "", "sayecito");
if(mysqli_connect_errno()){
	echo "Este sitio esta presentando problemas";
}
$mysqli->set_charset("utf8"); 

*/
?>