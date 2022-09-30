<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Residencias Sayecito</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>

@media only screen and (max-width: 90px)
{

    .row.show{

      margin-top: 15px;

      margin-left: 5px;

      max-width: 100px;

      transform: scale(.2);
    
    }   

}

a{
  color:blue;
}



table#usuario
{
	display:inline-block;
	padding:2px;
	//background: #E0FFFF	;
  position: relative;
  // border-radius: 1em;
  left:   30px;
  width: 600px;
  height: 150px;

}

table#propaganda1
{
	display:inline-block;
	padding:5px;
	background:blue;
  position: relative;
  //border-radius: 1em;
  left:   50px;
  width: 250px;
  height: 150px;
}

table#propaganda2
{
	display:inline-block;
	padding:25px;
	background:yellow;
  position: relative;
  //border-radius: 1em;
  left:   50px;
  width: 250px;
  height: 150px;
}

table#propaganda3
{
	display:inline-block;
	padding:25px;
	background:green;
  position: relative;
  //border-radius: 1em;
  left:   50px;
  width: 250px;
  height: 150px;
}

table#propaganda4
{
	display:inline-block;
	padding:25px;
	background:silver;
  position: relative;
  //border-radius: 1em;
  left:   50px;
  width: 250px;
  height: 150px;
}

table#propaganda5
{
	display:inline-block;
	padding:25px;
	background:maroon;
  position: relative;
  //border-radius: 1em;
  left:   50px;
  width: 250px;
  height: 150px;
}

</style>
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">
 


<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 

<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header" >
        <a href="Principal.php?cedula= <?php echo $_GET['cedula'];?>&email= <?php echo $_GET['email']; ?>" class="navbar-brand"><b>Residencias Sayecito</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>


  

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
            <?php
                  $email  = $_GET['email'];
                  $cedula = $_GET['cedula'];
                  echo "  <a href='Principal.php?cedula=$cedula&email=$email' ><b>Principal</b>
                    </a>";
                ?> 
            </li>
            <li>
                <a href="#">Quienes Somos
                </a>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articulos Relacionados <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="https://www.condominiosvenezuela.com/" target="_blank">Condominios Venezuela
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="https://www.procondominios.com.ve/" target="_blank">Qué es la Junta de Condominio
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="https://www.monografias.com/trabajos61/actividades-responsabilidades-junta-condominio/actividades-responsabilidades-junta-condominio" target="_blank">
                      Principales actividades y responsabilidades
                        <br> de una Junta de Condominio                       
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">Poner mas link                        
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">Otro link       
                    </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>  
 
 

<!-- AQUI TERMINA BARRA DE NAVEGACION -->   

  <!-- Full Width Column -->
  <div class="content-wrapper">
  
      <!-- Main content -->
     
      <table id="usuario" border="0">
        <tr>
          <td>
            <?php
            include ("php/connect.php");
            
            $email  = $_GET['email'];
            $cedula = $_GET['cedula'];
           
          //echo $email." ".$cedula;
          
          if(empty($cedula) or empty($email))
          {
            echo "<script>alert('Email y/o Clave No Valida.');
            location.href ='index.php';
            </script>"; 
          }
          
          $sql1="SELECT NOMBRE AS TT,APELLIDO FROM apartamentos WHERE CORREOA='$email' AND CEDULA='$cedula'";
          $result1=mysqli_query($mysqli,$sql1);
          while($mostrar1=mysqli_fetch_array($result1))
          {
            $nombre = $mostrar1['TT'];
            $apellido = $mostrar1['APELLIDO'];
          }
          
          if( empty($nombre))
          {
            echo "<script>alert('usuario');
            location.href ='index.php';
            </script>";
          }
 



	$query="SELECT * FROM apartamentos WHERE CORREOA='$email' AND CEDULA='$cedula'";
	$consulta2=$mysqli->query($query);
	if($consulta2->num_rows>0){
		$fila=$consulta2->fetch_array(MYSQLI_ASSOC);
	    
		$_SESSION['user']=$fila['NOMBRE']." ".$fila['APELLIDO'];
		$_SESSION['verificar']=true;
		$_SESSION['email']=$fila['CORREOA'];
		$_SESSION['cedula']=$fila['CEDULA'];
		$_SESSION['piso']=$fila['PISO'];
		$_SESSION['apartamento']=$fila['APARTAMENTO'];
 

	if ($_SESSION['cedula']==3718104 or $_SESSION['cedula']==6821253)
	{	
		echo "<h4 style='color:orange; margin-left: 1px'>";
		echo "Bienvenido Propietario/a " .$_SESSION['user'];
		echo "</h4>";

    echo "<h4 style='color:orange;'>";
		echo "Ingresar al Modulo Administrador
 			 <A style='color:red' HREF='administrador.php?cedula=$cedula&email=$email' >Pulsa Aqui</A>
 			 ";
        echo "</h4>";
		echo "
			 	<A href='consultapropietario.php?cedula=$cedula&email=$email'>
			 		1.- Consultar Propietarios del Edf.
			 	</A>" ;
         echo "<br>";

		echo "
			 	<A href='consultafacturas.php?cedula=$cedula&email=$email'>
			 		2.- Consultar Facturas Canceladas
			 	</A>" ;
         echo "<br>";

		echo "
			 	<A href='seleccionarecibos.php?cedula=$cedula&email=$email'>	
			 		3.- Consultar Recibos de Pago 
			 	</A> <br>" ;
  
        
	}
	else
	{ 
		echo "<h4 style='color:orange; margin-left: 90px'>";
		echo "Bienvenido Propietario/a " .$_SESSION['user'];
		echo "</h4>";	

		echo "<br>";
 
		echo "<h5 style='color:blue; margin-left: 130px'>
			 	<A href='consultapropietario.php?cedula=$cedula&email=$email'>
			 		1.- Consultar Propietarios del Edf.
			 	</A>
			 </h5>" ;
		echo "<h5 style='color:blue; margin-left: 130px'>
			 	<A href='consultafacturas.php?cedula=$cedula&email=$email'>
			 		2.- Consultar Facturas Canceladas
			 	</A>
			 </h5>" ;
		echo "<h5 style='color:blue; margin-left: 130px'>
			 	<A href='seleccionarecibos.php?cedula=$cedula&email=$email'>	
			 		3.- Consultar Recibos de Pago
			 	</A>
			 </h5>" ;

       echo "<h5 style='color:blue; margin-left: 130px'>
  
       </A>
     </h5>" ;
	}
}
else { 

	$query="SELECT * FROM apartamentos WHERE  CEDULA=6821253";
	$consulta2=$mysqli->query($query);
 
		$fila=$consulta2->fetch_array(MYSQLI_ASSOC);
 
		echo "AUN NO ESTAS REGISTRADO !<br>";
		echo "COMUNICATE CON EL ADMINISTRADOR DEL EDIFICIO <br>";

		echo "<h7 style='color:red; margin-left: 100px'>";
		echo $fila['NOMBRE']." ".$fila['APELLIDO'];
		echo "</h7>";
		
		echo "<h6 style='color:BLUE'>";
		echo "Por su Email : ".$fila['CORREOA']." o Por su Telefono ".$fila['TELEFONOCE'];
		echo "</h6>";
 
 
		echo "<h4 style='margin-left: 100px'>"; 
		echo "<A  HREF='index.php' > PULSA PARA REGRESAR </A>";
		echo "</h4>";
	 
}

?> 

     
              </td>
              </tr>
      </table>
      <br>

         <table id="propaganda1" border="0">
          <tr>
            <td style="font-size:12px; color:white">
              
                <b>Para colocar Información, Fotos, Propaganda Etc,, que se requiera

             </td>
          </tr>
        </table> 

        <table id="propaganda2" border="0">
          <tr>
            <td>
                <h1>
               
                </h1>
            </td>
          </tr>
        </table>

        <table id="propaganda3" border="0">
          <tr>
            <td>
                <h1>
                 
                </h1>
            </td>
          </tr>
        </table> 

        <table id="propaganda4" border="0">
          <tr>
            <td>
                <h1>
                 
                </h1>
            </td>
          </tr>
        </table>

        <table id="propaganda5" border="0">
          <tr>
            <td>
                <h1>
                 
                </h1>
            </td>
          </tr>
        </table>         
  


      <!-- /.content -->
    </div>




    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php") ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
