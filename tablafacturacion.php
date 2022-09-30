<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <title>Sayecito</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Main Stylesheet File -->
  <link href="estilo.css" rel="stylesheet">

    <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="tcal.css" />
  <script type="text/javascript" src="tcal.js"></script> 


<script>
  function validarSiNumero(numero){
    if (!/^[0-9]+([.][0-9]+)?$/.test(numero))
      alert("El valor " + numero + " no es un número");
  }

// [0-9,]+[^.]
//  ^[0-9]+([,][0-9]+)?$
</script>




</head> 
<body> 

  <!-- Header -->
  <header id="header">

    <div class="container">

      <h2 align="center"><b>
            <?php
               
              $cedula=$_GET['cedula'];
              $email=$_GET['email'];

              echo "<A href='administrador.php?cedula=$cedula&email=$email'>Regresar al Menu Anterior</A>";
            ?>
      </b></h2>

    </div>
    
  </header>      


    </div>
 

  <div align="center"  > 
   

  <form name='formulario' id='formulario' method='post' action='incluirfacturacion.php?cedula=$cedula&email=$email' target='_self' enctype="multipart/form-data"> 

  <table border="1" cellspacing="20" cellpadding="10" width="800"> 

  <tr >
    <td align="center">
        <?php
            
            $cedula=$_GET['cedula'];
            $email=$_GET['email'];


            $session['cedula'] = $cedula;
            include ("php/connect.php");

          $sql="SELECT * from facturacion WHERE   CIERREMES = 1 order by 
          ANOFACTURACION,MESFACTURACION DESC LIMIT 1";

            $result=mysqli_query($mysqli,$sql);
            $mes = 0;
            while($mostrar1=mysqli_fetch_array($result))
            {
                 
                $mes=$mostrar1['MESFACTURACION'];
                $ano=$mostrar1['ANOFACTURACION'];
        
            }
 
              if ($mes == 12) {
                 $ano++;
                 $mes = 1;
              }
              else
                { $mes = $mes + 1; }

            
        ?>

             A/o a cargar <input type="text" value="<?php echo $ano; ?> " disabled size="3" maxlength="3" >  
            Mes a cargar <input type="text" value="<?php echo $mes; ?> " disabled size="2" maxlength="2">
             <input type="hidden" name="MES" value="<?php echo $mes; ?> "> 
             <input type="hidden" name="ANO" value="<?php echo $ano; ?> ">  
    </td>
  </tr>
 
    <tr>
      <td>Facturas ya Cargadas

       <select>
          <?php
              echo "<meta charset='utf-8'>";
              $i = 0;
              $tmp[] = "";
              include ("php/connect.php");
              $sql="SELECT * from facturacion 
              where 
              MESFACTURACION = $mes and ANOFACTURACION = $ano order by CODIGOFACTURACION";
              $result=mysqli_query($mysqli,$sql);
              while($mostrar=mysqli_fetch_array($result))
              {     

                      $aaa = $mostrar['CODIGOFACTURACION'];

                      $sql1="SELECT * from descripcionfacturas where CODIGOFACTURA = $aaa  ";
                      $result1=mysqli_query($mysqli,$sql1); 
                      while($mostrar1=mysqli_fetch_array($result1))
                      {
                        $bbb = $mostrar1['DESCRIPCIONFACTURA'];
                      }

                      $ccc = $aaa." ".$bbb;
                      $tmp[$i] = $aaa;
                      $i++;
                      echo '<option  value="'.$ccc.'">'.$ccc.'</option>';
              }
          ?>
        </select> 
     </td>      
    </tr>
    <tr>

      <td>Factura a Carga

   <select name="CODIGOFACTURA" id="selec" required>  

         <option value="">Seleccione:</option>  
        <?php
                      $x = 0;

                      $sql="SELECT * from descripcionfacturas order by CODIGOFACTURA ";
                      $result=mysqli_query($mysqli,$sql); 
                      while($mostrar=mysqli_fetch_array($result))
                      {

                           $array2[$x] = $mostrar['CODIGOFACTURA'];
                           $x++;
                           /* echo '<option  value="'.$mostrar['CODIGOFACTURA'].".".$mostrar['DESCRIPCIONFACTURA'].'">'.$mostrar['DESCRIPCIONFACTURA'].'</option>';*/
                      }

                   /*     print_r($array2); 
                        echo "<br><br><br>";*/
                        $totalarray2 = count($array2);
                    /*    echo " totalarray2 ".$totalarray2; echo "<br><br>";*/
                        
                        if ( is_null($tmp) )
                        {
                                                  echo "<br><br><br>";
                        $totaltmp = 0;
                   /*     echo " totaltmp ".$totaltmp; echo "<br><br>";*/
                        }

                                              
                   /*     print_r($tmp); 
                        echo "<br><br><br>";*/
                        $totaltmp = count($tmp);
                   /*     echo " totaltmp ".$totaltmp; echo "<br><br>";*/

                        $resultado = array_diff($array2, $tmp) ;
                       
                    /*    print_r($resultado); echo "<br><br><br>";*/
                        $totalresultado = count($resultado);
                    /* echo " totalresultado ".$totalresultado; echo "<br><br>";*/

                    /* print_r(array_values($resultado)[0]);echo "<br><br>"; */

                      for ($a=0; $a <= $totalresultado-1  ; $a++) 
                      { 
                                                                       
                      /*    echo " codigofactura ".$a; */
                          $codigofactura = (array_values($resultado)[$a]); 

                          $sql="SELECT * from descripcionfacturas where CODIGOFACTURA = $codigofactura";
                          $result=mysqli_query($mysqli,$sql);
                          while($mostrar=mysqli_fetch_array($result))
                          {     

                                $aaa = $mostrar['CODIGOFACTURA'];
                                $bbb = $mostrar['DESCRIPCIONFACTURA'];
                                $ccc = $aaa." ".$bbb;
                              
                            echo '<option  value="'.$ccc.'">'.$ccc.'</option>';
                          }
                      } 
        ?>
       </select> 



      </td>



      </tr>
    <tr>
      <td align="left">
          
        <!--Fecha Facturación <input type="text" name="FECHFACTURA" class="tcal" id="FECHAFACTURA" /></div> -->
        Fecha de la Factura a Pagar <input type="date" name="FECHAFACTURA" id="FECHAFACTURA" size="10" maxlength="10" required/>
        
      </td>
        </tr>
          <tr>
      <td>
          
          Numero del RIF de la Factura <input type="text" name="RIFFACTURA" id="RIF" size="10" maxlength="10" title="Un Número de RIF es requerido de no poseerlo coloque ( SIN RIF )" required />
        
      </td>
    </tr>
    <tr>
      <td>
          
          Numero de la Factura <input type="text" name="NUMEROFACTURA" id="NUMEROFACTURA" size="10" maxlength="10" title="Un Número de Factura es requerido de no poseerlo coloque ( S/N )" required />
        
      </td>
    </tr>
    <tr>
      <td>
          
          Factura a Nombre de  <input type="text" name="NOMBREFACTURA" id="NOMFACTURA" title="Nombre de la persona a la que se le paga es requerido no poseerlo coloque ( SIN NOMBRE )" required />
        
      </td>
        </tr>
          <tr>
      <td>
          
          Descripción de la Factura a Pagar <input type="text" name="DESCRIPCIONFACTURA" id="DESCFACTURA" size="50" maxlength="50" title="Una descripcion de lo que se esta pagando es requerido de no poseerlo coloque ( SIN DESCRIPCION )" required />
        
      </td>
        </tr>
          <tr>
      <td>

          
          Monto de la Factura a pagar <input type="text" name="MONTOCFACTURA" id="MONTOFACTURA" title="Este concepto es OBLIGATORIO, si el MONTO ES EXACTO se coloca 1000 sin decimales, o con decimales 1234,50" onChange="validarSiNumero(this.value);" required />
        
      </td>
        </tr>
        <tr>
      <td>

          
         <input type="hidden" name="ss" />
        
      </td>
        </tr>
     <tr>
    <tr>            
        <td>  
          <input type="submit" value="Cargar la Factura"  >
         </td>
      <input type="hidden" name="CEDULAFACTURA" value="<?php echo $cedula; ?> "> 
      <input type="hidden" name="EMAILFACTURA" value="<?php echo $email; ?> "> 

 
    </tr> 
  </table>

   </form>
  </div>
  
<section class="main">
    <div class="wrapp">


    </div>


  </section>
  <?php include("footer.php") ?>

</body> 
</html> 