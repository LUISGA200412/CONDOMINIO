<?php

/*
$mysqli= new mysqli("localhost", "id12739236_luisga", 
	"cOxtUSSUt7sLz&@q", "id12739236_edificio");
	if(mysqli_connect_errno()){
		echo "Este sitio esta presentando problemas";
	}
	$mysqli->set_charset("utf8"); 

 */	
	$mysqli= new mysqli("localhost", "root", "", "pwcon");
	if(mysqli_connect_errno()){
		echo "Este sitio esta presentando problemas";
	}
	$mysqli->set_charset("utf8"); 

 

?>