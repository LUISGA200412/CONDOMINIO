<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Condominio</title>
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
  <link rel="stylesheet" href="css/entrada.css">

</head>
 
<body class="hold-transition skin-red layout-top-nav">

<!-- AQUI EMPIEZA BARRA DE NAVEGACION --> 
 
<!-- AQUI FINALIZA BARRA DE NAVEGACION -->   
  

    <div class="content-wrapper">
      <div class="container">

<!-- DESDE AQUI SE DEBE PONER LOS CODIGOS --> 
 
<?php
//Recipiente
//$to = 'luisegd160354@gmail.com';

//remitente del correo
$from = 'luisegd160354@gmail.com';
$fromName = 'Administrador/a Residencia Sayecito';

//Asunto del email
$subject = 'Recibo de Pago de Condominio del Mes';

//Ruta del archivo adjunto
$file = "fpdf/RECIBOSDEPAGO/condominio-del-202211.pdf";

//Contenido del Email
$htmlContent = '<h1>Favor no dar Reply a este Correo,,, ESTO ES UNA PRUEBA DEL SISTEMA</h1>';

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparación de archivo
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= 
        "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
       // "Content-Description: ".basename($file[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

include("conexion.php");

$sql="SELECT * from apartamentos where CORREOA > '' order by PISO,APARTAMENTO";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
{
   $to = $mostrar['CORREOA'];
    $apt = $mostrar['NOMBRE']." ". $mostrar['APELLIDO'];

//Enviar EMail
$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//Estado de envío de correo electrónico
echo $mail?"<h5 style='align:left'>Correo enviado a : $apt</h5>":"<h5 style='align:left; color:red'>El envío de correo para : $apt falló.</h5>";


}


/*
if (mail($to, $subject, $message, $headers, $returnpath)) 
{
  echo  "<p align='center' style='color:green'>Mensaje enviado a : $contacto </p>";
 
} 
else 
{
  echo "<p align='center' style='color:red'> No se pudo enviar el mensaje.. </p>";
  echo "<p align='center' style='color:red'> Error de correo : $mail->ErrorInfo </p>"; 
}       


echo "<br>";
echo "<p align='center' > <a href='Principal.php'>Regresar al Menu Anterior</a> </p>";

*/

//Enviar EMail
//$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//Estado de envío de correo electrónico
//echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";

?>


<h1 class="text-center">
              <?php
 
                $cedula = $_GET['cedula'];
                $email  = $_GET['email'];

                echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";

              ?>
  </h1>
  
<!-- HASTA AQUI SE DEBE PONER LOS CODIGOS --> 

</div>  
    </div>
 
<!-- FOOTER --> 

<?php
	include("footer.php");
?> 
 

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
 <!-- DataTables -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script> 