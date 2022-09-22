<?php
	session_start();
	if(!$_SESSION['verificar']){
		header("Location: index.php");
	}
	echo $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Leer o seleccionar datos de la base de datos</title>
</head>
<body>
	<table>
		<thead>
			<tr>
      <td>Piso</td> 
      <td>Apartamento Nº</td> 
      <td>Cedula</td>
      <td>Nombre</td>
      <td>Apellido</td>
      <td>Email Principal</td>
      <td>Email Secundario</td>
      <td>Telefono Hogar</td> 
      <td>Telefono Celular</td>
      <td>Modificar</td>
			</tr>
		</thead>
		<tbody>
			<?php
				require_once "php/connect.php";
				$query="SELECT * FROM apartamentos";
				$consulta1=$mysqli->query($query);
				while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>
	 
      <td>".$fila['PISO']."</td>

      <td>".$fila['APARTAMENTO']."</td>
      <td>".$fila['CEDULA']."</td>
      <td>".$fila['NOMBRE']."</td>
      <td>".$fila['APELLIDO']."</td>
      <td>".$fila['CORREOA']."</td>
      <td>".$fila['CORREOB']."</td>
      <td>".$fila['TELEFONOCA']."</td>
      <td>".$fila['TELEFONOCE']."</td>



						<td><a href='actualizar.php?id=".$fila['APARTAMENTO']."'>Actualizar</a></td> 
						<td><a href='eliminar.php?id=".$fila['APARTAMENTO']."'>Eliminar</a></td>
					</tr>";
				}
			?>			
		</tbody>
	</table>
	<a href="logout.php">Cerrar sesion</a>
</body>
</html>