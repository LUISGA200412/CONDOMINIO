<?php


 /*$mysqli= new mysqli("localhost", "id19437039_luisegd160354", 
	"Luisga200412*", "id19437039_sayecito");
	if(mysqli_connect_errno()){
		echo "Este sitio esta presentando problemas";
	}
	$mysqli->set_charset("utf8"); 

*/
	$mysqli= new mysqli("localhost", "root", "", "sayecito");
	if(mysqli_connect_errno()){
		echo "Este sitio esta presentando problemas";
	}
	$mysqli->set_charset("utf8"); 

 

?>	 	