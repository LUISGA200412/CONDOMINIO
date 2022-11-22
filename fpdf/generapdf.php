 
<?php 

$tasa=$_POST['tasa'];
$cedula=$_GET['cedula'];
$email=$_GET['email'];


 
/* print_r($_GET);*/

/*error_reporting(0);*/

include('../fpdf/fpdf.php');
 
 
//Conecto a la base de datos



include ("../fpdf/connect.php");

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
 

$pdf->Image('sayecito1.jpg',10,8,33);
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
$pdf->Cell(115,6,'',0,0);
$pdf->SetFillColor(255,215,0);
$pdf->Cell(75,6,'GASTOS COMUNES',1,0,'C',True);
$pdf->SetFillColor(255,255,255);

$pdf->Ln(6);


$pdf->SetFont('Arial','B',8);
$pdf->Cell(115,6,'',0,0);
$pdf->Cell(25,6,'ALICUOTAS',1,0,'C',0);
$pdf->Cell(25,6,'2,57900',1,0,'C',0);
$pdf->Cell(25,6,'3,07850',1,0,'C',0);
$pdf->Ln(6);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra


$pdf->SetFont('Arial','B',7);
$pdf->Cell(115,6,'Descrpcion',1,0,'C',0);
$pdf->Cell(25,6,'Total',1,0,'C',0);
$pdf->Cell(25,6,'Aptos',1,0,'C',0);
$pdf->Cell(25,6,'PH',1,0,'C',0);
$pdf->Ln(6);
 
$pdf->SetFillColor(255,215,0);

$totalgastos=0;$totalgastosapto=0;$totalgastosph=0;

 $query="SELECT * FROM facturacion WHERE CIERREMES = 0 and TIPOFACTURACION = 0 ORDER BY CODIGOFACTURACION";
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
		
	



    	$pdf->Cell(115,6,$descripcionfactura,1,0,'L',0);
 
      	$pdf->Cell(25,6,$precio,1,0,'R',1);

 		$pdf->Cell(25,6,$numero,1,0,'R',1);

 		$pdf->Cell(25,6,$ph,1,0,'R',1);
 
		$pdf->Ln(6);
 
}


 
		$pdf->Cell(115,6,'',1,0,'L',0);
    	$pdf->Cell(25,6,'',1,0,'R',0);
    	$pdf->Cell(25,6,'',1,0,'R',0);
    	$pdf->Cell(25,6,'',1,0,'R',0);
		$pdf->Ln(6); 

		$pdf->SetFont('Arial','B',7);
		$pdf->SetFillColor(255,255,255);

		$pdf->Cell(115,6,'FONDO DE RESERVA/EMERGENCIA 40%',1,0,'L',0);
		$fondo = $totalgastos * 0.40;
 		$fondoreserva =	number_format($fondo, 2, ",", ".");
		$fondoapto = $fondo * 2.57900 / 100;
		$fondoapartamento =	number_format($fondoapto, 2, ",", ".");


		$fondoph = $fondo * 3.07850 / 100;
		$fondopenthouse =	number_format($fondoph, 2, ",", ".");

    	$pdf->Cell(25,6,$fondoreserva,1,0,'R',0);
    	$pdf->Cell(25,6,$fondoapartamento,1,0,'R',0);
    	$pdf->Cell(25,6,$fondopenthouse,1,0,'R',0);
		$pdf->Ln(6);




/* DESDE AQUI SE HACE BUSCA DE OTRA FACTURAS */

$totalgastosespecial=0;$totalgastosaptoespecial=0;$totalgastosphespecial=0;

$query2="SELECT * FROM facturacion WHERE CIERREMES = 0 and TIPOFACTURACION = 1 ORDER BY CODIGOFACTURACION";
$resultado2=$mysqli->query($query2);

while($fila2=$resultado2->fetch_array(MYSQLI_ASSOC))
{

	$cc2 = $fila2['CODIGOFACTURACION'];

	$query3="SELECT * FROM descripcionfacturas WHERE CODIGOFACTURA = $cc2 ";
	$consulta3=$mysqli->query($query3);
	 
		$fila3=$consulta3->fetch_array(MYSQLI_ASSOC);

    	$aptoespecial = $fila2['MONTOFACTURACION']  * 2.57900 / 100;
 
    	$pehespecial = $fila2['MONTOFACTURACION']   * 3.07850 / 100;

		$descripcionfacturaespecial = $fila3['DESCRIPCIONFACTURA'];
 
   		$precioespecial = number_format($fila2['MONTOFACTURACION'], 2, ",", ".");

   		$totalgastosespecial = $totalgastosespecial + $fila2['MONTOFACTURACION'];
   		
   		$totalgastosaptoespecial = $aptoespecial + $totalgastosaptoespecial;

   		$totalgastosphespecial 	=  $pehespecial  + $totalgastosphespecial;

		$numeroespecial = number_format($aptoespecial, 2, ",", ".");
		
		$phespecial = number_format($pehespecial, 2, ",", ".");
		
	
		$pdf->SetFont('Arial','B',7);

	

    	$pdf->Cell(115,6,$descripcionfacturaespecial,1,0,'L',0);
 
      	$pdf->Cell(25,6,$precioespecial,1,0,'R',1);

 		$pdf->Cell(25,6,$numeroespecial,1,0,'R',1);

 		$pdf->Cell(25,6,$phespecial,1,0,'R',1);
 
		$pdf->Ln(6);

}

/* HASTA AQUI SE HACE BUSCA DE OTRA FACTURAS */
 
		$pdf->Cell(115,6,'',1,0,'L',0); 
		$pdf->Cell(25,6,'',1,0,'R',0);
		$pdf->Cell(25,6,'',1,0,'R',0);
		$pdf->Cell(25,6,'',1,0,'R',0);
		$pdf->Ln(6);


		$pdf->SetFont('Arial','B',10);
		$pdf->SetFillColor(255,0,0);
		$totalgastoscomu = $totalgastos + $fondo + $totalgastosespecial;
		$pdf->Cell(115,6,'Total Gastos Comunes',1,0,'L',0);
 		$totalgastoscomunes =	number_format($totalgastoscomu, 2, ",", ".");
     	$pdf->Cell(25,6,$totalgastoscomunes,1,0,'R',1);
    	$pdf->Cell(25,6,'',1,0,'R',0);
    	$pdf->Cell(25,6,'',1,0,'R',0);
		$pdf->Ln(6);

 
		$pdf->Cell(115,6,'Total a Pagar por Apartamento',1,0,'R',0);
		$totalpagoapto = $totalgastosapto + $fondoapto + $totalgastosaptoespecial ;
		$totalpagoph   = $totalgastosph   + $fondoph + $totalgastosphespecial;
  		$totalpagoapartamentos =	number_format($totalpagoapto, 2, ",", ".");
 		$totalpagopenthouse	   =	number_format($totalpagoph, 2, ",", ".");
    	$pdf->Cell(25,6,'',1,0,'R',0);
    	$pdf->Cell(25,6,$totalpagoapartamentos,1,0,'R',0);
    	$pdf->Cell(25,6,$totalpagopenthouse,1,0,'R',0);
    	$pdf->Ln(6);

		$pdf->SetFillColor(255,140,0);
		$pdf->Cell(115,6,'Monto en Divisa ($)',1,0,'R',0);
		$totalpagoaptod =  $totalpagoapto / $tasa ;
		$totalpagophd   = $totalpagoph  / $tasa ;
  		$totalpagoapartamentosd =	number_format(round($totalpagoaptod), 2, ",", ".");
 		$totalpagopenthoused   =	number_format(round($totalpagophd), 2, ",", ".");
    	$pdf->Cell(25,6,'',1,0,'R',0);
    	$pdf->Cell(25,6,$totalpagoapartamentosd,1,0,'R',1);
    	$pdf->Cell(25,6,$totalpagopenthoused,1,0,'R',1);
    	$pdf->Ln(10);		

		$pdf->SetFont('Arial','B',9);
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

$path = "../fpdf/RECIBOSDEPAGO/".$archivoenpdf;
//$path1 = "../administrador.php?cedula=".$cedula;

//   echo "<script>alert('GENERACION DEL DOCUMENTO DE CONDOMINIO MENSUAL SE GENERO EXITOSAMENTE.');
  //          location.href ='../administrador.php'+'?cedula=$cedula&email=$email';
    //        </script>"; 
//$pdf->Output($archivoenpdf,"S");
//
$pdf->Output($path,"F");

//header('location:'.$path1); 
}
?> 
                      <?php            
                        $cedula=$_GET['cedula'];
                                  $cont = 0;
                                  $the_array = Array(); 
                                  $handle = opendir('../fpdf/RECIBOSDEPAGO'); 
                                  while (false !== ($file = readdir($handle))) 
                                  { 
                                    if ($file != "." && $file != "..") 
                                    { 
                                      $cont ++;
                                      $the_array[] = $file; 
                                    } 
                                  } 
                                  
                                  closedir($handle);

                                  if ($cont > 0) 
								  {
                                      sort ($the_array); 
                                      $xx = end( $the_array );
                                      echo "<b>"; 
										echo "<script>alert('DOCUMENTO DE CONDOMINIO MENSUAL SE GENERO EXITOSAMENTE.');
										location.href ='../fpdf/RECIBOSDEPAGO/$xx';
												</script>"; 

                                    }  
                      ?>