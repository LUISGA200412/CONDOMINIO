<?php 
require('../fpdf/AttachMailer.php'); 

$mailer = new AttachMailer("luisegd160354@gmail.com", "luisegd160354@gmail.com", "asunto pdf", "pdf hello contenido del mensaje");
$mailer->attachFile("../fpdf/condominioressayecitomes1.pdf");
$mailer->send() ? "Enviado": "Problema al enviar";
