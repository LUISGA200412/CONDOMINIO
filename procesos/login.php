<?php
$email=$_POST['email'];
$clave=($_POST['clave']);
$query="SELECT * FROM apartamentos WHERE CORREOA='$email' AND CEDULA='$clave'";
$consulta2=$mysqli->query($query);
if($consulta2->num_rows>=1){
    $fila=$consulta2->fetch_array(MYSQLI_ASSOC);
		$_SESSION['user']=$fila['NOMBRE']." ".$fila['APELLIDO'];
		$_SESSION['verificar']=true;
		$_SESSION['email']=$fila['CORREOA'];
		$_SESSION['cedula']=$fila['CEDULA'];
		$_SESSION['piso']=$fila['PISO'];
		$_SESSION['apartamento']=$fila['APARTAMENTO'];
		
		
		       echo "<form id='form1' name='form1' method='post' action='propietario.php'>
                <input type='text' name='cedula'>
                <p></p>
                <input type='submit' value='Buscar'><p></p>
                </form>";
	//	header("Location: propietario.php");
		exit();
	}
?>