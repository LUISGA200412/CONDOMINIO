<!DOCTYPE html>
<html lang="en">

<head>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Residencias Sayecito</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>

<body>

  <!-- Header -->


  <header id="header">

    <div class="container">

      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<A href='../administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
      </b></h2>

    </div>
    
  </header>  







  
	<table border="0"  align="center">

<div align="center">

      <h1>
          Seleccione Recibo.
      </h1>
		
 			<?php  


 			 
					$the_array = Array(); 
					$handle = opendir('../fpdf/RECIBOSDEPAGO'); 
					while (false !== ($file = readdir($handle))) 
					{ 
   							if ($file != "." && $file != "..") 
   							{ 
   								$the_array[] = $file; 
   							} 
					} 
					closedir($handle); 
					sort ($the_array); 


					foreach($the_array as $val)
					{ 		

							echo "<tr>";
							echo "<td>"; 

      
                echo "<h3>"; 
  							echo "<a target='_blank' href='../fpdf/RECIBOSDEPAGO/$val'>$val</a>"; 
                echo "</h3>"; 

  							echo "</td>";
  							echo "</tr>";   

					}
					//$xx = end( $the_array );
					//echo "<a href='../fpdf/RECIBOSDEPAGO/$xx'>$xx</a>"; 
				 
 
				?>

 
	</table>

</div>
<br>
<?php   include("../redessociales.php") ?>

</body>
</html>