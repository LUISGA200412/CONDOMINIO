 
<?php 

$cedula=$_GET['cedula'];
$email=$_GET['email'];


 
/* print_r($_GET);*/

/*error_reporting(0);*/

include('../fpdf/fpdf.php');
 
 
//Conecto a la base de datos



include ("../php/connect.php");

$mysqli->set_charset("utf8");
 

   
$mesfacturacion = 0;
//Consulta la tabla productos solicitando todos los productos
 $query1="SELECT * FROM facturacion WHERE CIERREMES = 0 ";
 $resultado1=$mysqli->query($query1);
 
while($fila11=$resultado1->fetch_array(MYSQLI_ASSOC))
 
{
	
     	$mesfacturacion = $fila11['MESFACTURACION'];

     	if ( $mesfacturacion < 10 )
     	{
     		$mesfacturacion = "0".$mesfacturacion;
     	}
}
 
    $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mes = $mes[($mesfacturacion * 1) -1 ];


if ($mesfacturacion ==0) {
    

    echo "<script>alert('NO HAY FACTURACIONES CARGADAS PARA GENERA EL RECIBO,,,,,, FAVOR CARGE AL MENOS UNA FACTURACION.');
            location.href ='../administrador.php'+'?cedula=$cedula&email=$email';
            </script>";
}
else 
{    
 
 
    $archivoenpdf = "condominio-del-".date("Y").date($mesfacturacion).".pdf";
    $messalida = "Del Mes ".date($mesfacturacion).utf8_decode(" Año ").date("Y");


 
//Instaciamos la clase para genrear el documento pdf

    //echo " cedula ".$_GET['cedula']."".$messalida;
$pdf=new FPDF();
 
$pdf->AddPage();
 

$pdf->Image('cover.jpg',10,8,33);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(100,10,'',0,0,'C');
$pdf->Cell(30,10,'Residencias Sayecito',0,0,'R');
$pdf->Ln(8);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(190,8,'Recibo de Condominio',0,0,'C');
$pdf->Ln(7);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(65,8,'',0,0);
$pdf->Cell(60,8,$messalida,0,0,'C');
$pdf->SetY(40);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(115,8,'',0,0);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(75,8,'GASTOS COMUNES',1,0,'C',True);
$pdf->Ln(8);


$pdf->SetFont('Arial','B',8);
$pdf->Cell(115,8,'',0,0);
$pdf->Cell(25,8,'ALICUOTAS',1,0,'C',0);
$pdf->Cell(25,8,'2,57900',1,0,'C',0);
$pdf->Cell(25,8,'3,07850',1,0,'C',0);
$pdf->Ln(8);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra


$pdf->SetFont('Arial','B',8);
$pdf->Cell(115,8,'Descrpcion',1,0,'C',0);
$pdf->Cell(25,8,'Total',1,0,'C',0);
$pdf->Cell(25,8,'Aptos',1,0,'C',0);
$pdf->Cell(25,8,'PH',1,0,'C',0);
$pdf->Ln(8);
 
$totalgastos=0;$totalgastosapto=0;$totalgastosph=0;

 $query="SELECT * FROM facturacion WHERE CIERREMES = 0 ORDER BY CODIGOFACTURACION";
 $resultado=$mysqli->query($query);

while($fila=$resultado->fetch_array(MYSQLI_ASSOC))
 
{
	$cc = $fila['CODIGOFACTURACION'];

	$query1="SELECT * FROM descripcionfacturas WHERE CODIGOFACTURA = $cc ";
	$consulta2=$mysqli->query($query1);
	 
		$fila1=$consulta2->fetch_array(MYSQLI_ASSOC);

    	$apto = $fila['MONTOFACTURACION']  * 2.57900 / 100;
 
    	$peh = $fila['MONTOFACTURACION']   * 3.07850 / 100;

		$descripcionfactura = $cc." ".$fila1['DESCRIPCIONFACTURA'];
 
   		$precio = number_format($fila['MONTOFACTURACION'], 2, ",", ".");

   		$totalgastos = $totalgastos + $fila['MONTOFACTURACION'];
   		
   		$totalgastosapto = $apto + $totalgastosapto;
   		$totalgastosph 	=  $peh  + $totalgastosph;

		$numero = number_format($apto, 2, ",", ".");
		
		$ph = number_format($peh, 2, ",", ".");

		$pdf->SetFillColor(200,220,255);
    
    	$pdf->Cell(115,8,$descripcionfactura,1,0,'L',0);
 
      	$pdf->Cell(25,8,$precio,1,0,'R',1);

 		$pdf->Cell(25,8,$numero,1,0,'R',1);

 		$pdf->Cell(25,8,$ph,1,0,'R',1);
 
		$pdf->Ln(8);
 
}

		$pdf->Cell(115,8,'',1,0,'L',0);
    	$pdf->Cell(25,8,'',1,0,'R',0);
    	$pdf->Cell(25,8,'',1,0,'R',0);
    	$pdf->Cell(25,8,'',1,0,'R',0);
		$pdf->Ln(8);

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(115,8,'Fondo de Reserva 40%',1,0,'L',0);
		$fondo = $totalgastos * 0.40;
 		$fondoreserva =	number_format($fondo, 2, ",", ".");
		$fondoapto = $fondo * 2.57900 / 100;
		$fondoapartamento =	number_format($fondoapto, 2, ",", ".");


		$fondoph = $fondo * 3.07850 / 100;
		$fondopenthouse =	number_format($fondoph, 2, ",", ".");

    	$pdf->Cell(25,8,$fondoreserva,1,0,'R',0);
    	$pdf->Cell(25,8,$fondoapartamento,1,0,'R',0);
    	$pdf->Cell(25,8,$fondopenthouse,1,0,'R',0);
		$pdf->Ln(8);

		$pdf->SetFont('Arial','B',10);
		$totalgastoscomu = $totalgastos + $fondo;
		$pdf->Cell(115,8,'Total Gastos Comunes',1,0,'L',0);
 		$totalgastoscomunes =	number_format($totalgastoscomu, 2, ",", ".");
     	$pdf->Cell(25,8,$totalgastoscomunes,1,0,'R',0);
    	$pdf->Cell(25,8,'',1,0,'R',0);
    	$pdf->Cell(25,8,'',1,0,'R',0);
		$pdf->Ln(8);

		$pdf->Cell(115,8,'Gastos Administrativos 10%',1,0,'L',0);
		$gastos = $totalgastos * 0.10;
 		$gastosadministrativos =	number_format($gastos, 2, ",", ".");	
		$gastosapto = $gastos / 38;
		$gastosapartamento =	number_format($gastosapto, 2, ",", ".");
 		$gastosph = $gastos / 38;
		$gastospenthouse =	number_format($gastosph, 2, ",", ".");
    	$pdf->Cell(25,8,$gastosadministrativos,1,0,'R',0);
    	$pdf->Cell(25,8,$gastosapartamento,1,0,'R',0);
    	$pdf->Cell(25,8,$gastospenthouse,1,0,'R',0);
		$pdf->Ln(8);

		$pdf->Cell(115,8,'Total a Pagar por Apartamento',1,0,'R',0);
		$totalpagoapto = $totalgastosapto + $fondoapto + $gastosapto;
		$totalpagoph   = $totalgastosph   + $fondoph   + $gastosph;
  		$totalpagoapartamentos =	number_format($totalpagoapto, 2, ",", ".");
 		$totalpagopenthouse	   =	number_format($totalpagoph, 2, ",", ".");
    	$pdf->Cell(25,8,'',1,0,'R',0);
    	$pdf->Cell(25,8,$totalpagoapartamentos,1,0,'R',0);
    	$pdf->Cell(25,8,$totalpagopenthouse,1,0,'R',0);
    	$pdf->Ln(20);

 

 		$pdf->Cell(190,4,'Efectuar la Cacelacion del pago mediante Transferencia a la Cuente Corriente',0,0,'L',0);
 		$pdf->Ln(4);
 		$pdf->Cell(190,4,'Bancaribe',0,0,'L',0);
 		$pdf->Ln(4);
 		$pdf->Cell(190,4,'Cuenta No: 0114-0184-81-1840047950 ',0,0,'L',0);
 		$pdf->Ln(4);
 		$pdf->Cell(190,4,'Titular : Condominio Residencias Sayecito',0,0,'L',0);
 		$pdf->Ln(4);
 		$pdf->Cell(190,4,'Rif : J-31481193-2',0,0,'L',0);
 		$pdf->Ln(4);
 		$pdf->Cell(190,4,'Favor enviar el recibo de pago al Email : RES.SAYECITO@GMAIL.COM',0,0,'L',0);
    	
 
//mysql_close($enlace);
 
//Mostramos el documento pdf

echo "wlkhglkñkhlkf";
$path = "../fpdf/RECIBOSDEPAGO/".$archivoenpdf;
//$path1 = "../administrador.php?cedula=".$cedula;

   echo "<script>alert('GENERACION DEL DOCUMENTO DE CONDOMINIO MENSUAL SE GENERO EXITOSAMENTE.');
            location.href ='../administrador.php'+'?cedula=$cedula&email=$email';
            </script>"; 
//$pdf->Output($archivoenpdf,"S");
//
$pdf->Output($path,"F");

//header('location:'.$path1); 
}
?> 