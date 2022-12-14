<<?php  



//incluimos la clase PHPMailer

require_once('src/phpmailer.php');



//instancio un objeto de la clase PHPMailer

$mail = new PHPMailer(); // defaults to using php "mail()"



$mail­>CharSet = "UTF­8";

$mail­>Encoding = "quoted­printable";



//defino el cuerpo del mensaje en una variable $body

//se trae el contenido de un archivo de texto

//también podríamos hacer $body="contenido...";



$body = file_get_contents('contenido.html');



//Esta línea la he tenido que comentar

//porque si la pongo me deja el $body vacío

// $body = preg_replace('/[]/i','',$body);



//defino el email y nombre del remitente del mensaje

$mail­>SetFrom('luisegd160354@gmail.com', 'Luis Gomez');



//defino la dirección de email de "reply", a la que responder los mensajes

//Obs: es bueno dejar la misma dirección que el From, para no caer en spam

$mail­>AddReplyTo('luisegd160354@gmail.com', 'Luis Gomez');



//Defino la dirección de correo a la que se envía el mensaje

$address = "luisegd160354@hotmail.com";



//la añado a la clase, indicando el nombre de la persona destinatario

$mail­>AddAddress($address, "Luis Gomez");



//Añado un asunto al mensaje

$mail­>Subject = "Envío de email con PHPMailer en PHP";



//Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto

$mail­>AltBody = "Cuerpo alternativo del mensaje";



//inserto el texto del mensaje en formato HTML

$mail­>MsgHTML($body);



//asigno un archivo adjunto al mensaje

$mail­>AddAttachment("ruta/archivo_adjunto.gif");



//envío el mensaje, comprobando si se envió correctamente

if(!$mail­>Send()) {

echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;

} else {

echo "Mensaje enviado!!";

}

?>