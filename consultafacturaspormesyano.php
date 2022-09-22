<?php   include("header.php") ?>
    <section class="main">
        <div class="wrapp">
            <div class="mensaje">
                <h1>Facturas Canceladas <?php 
                       echo "El Mes ".$_GET['MESSELECCIONADO']." Del ".$_GET['ANO'];
                 ?></h1>
            </div>

            <div class="articulo">
                <article>

                         <?php
         
 				                   $email  = $_GET['email'];
				                   $cedula = $_GET['cedula'];
                           $mes    = $_GET['MESSELECCIONADO'];
                           $ano    = $_GET['ANO'];
                           $i = 0;
                           $tmp[] = "";
                           include ("php/connect.php");

                           $sql="SELECT * FROM facturacion WHERE 
                           MESFACTURACION = $mes and ANOFACTURACION = $ano 
                           order by CODIGOFACTURACION";

                           $result=mysqli_query($mysqli,$sql);
                           while($mostrar=mysqli_fetch_array($result))
                           {     
                            $codigo = $mostrar['CODIGOFACTURACION'];
                            $fecha  = $mostrar['FECHAFACTURACION'];
                            $tmp[$i] = $codigo;
                            $tmp1[$i] = $fecha;
                            $i++;           
                           }
 
                        ?>

                   <table border="1"  align="center">
                    <tr>

                      <td align="center" WIDTH="100">Codigo Factura</td>  
                      <td align="center" WIDTH="500" >Descripciòn</td> 
                      <td align="center" WIDTH="200" >Fecha Cancelaciòn</td> 
 
                      </tr>
                                           
                          <?php
                        $totalresultado = count($tmp);
                      for ($a=0; $a <= $totalresultado-1  ; $a++) 
                      { 
                         $cod = $tmp[$a];
                         $fec = $tmp1[$a];

                          if ($cod < 10) {
                              $codigo = "0".$cod;
                          }else {
                            $codigo = $cod;
                          }


                          $sql1="SELECT * from descripcionfacturas where 
                          CODIGOFACTURA = $codigo";
                          $result1=mysqli_query($mysqli,$sql1); 
                          while($mostrar1=mysqli_fetch_array($result1))
                          {
                            $descripcion = $mostrar1['DESCRIPCIONFACTURA'];
                       
                            echo "<tr>";
                            echo "<td align='center' WIDTH='100' >$codigo</td>";
                            echo "<td align='left'   WIDTH='500'>$descripcion</td>";
                            echo "<td align='center' WIDTH='200'>$fec</td>";

                         echo "</tr>"; 
                          }
 
                      }
                        ?>
                          
                    </table>
                      <?php
    $email = $_GET['email']  ;
    $cedula  = $_GET['cedula']  ;
 
    echo "<br>";
    echo "<h4 style='margin-left: 200px'>"; 
    echo "<A  HREF='consultafacturas.php?cedula=$cedula&email=$email' > Seleccionar Otra Fecha</A>";
    echo "</h4>"; 
  ?>
                </article>
            </div>

        <?php include("sidebar.php") ?>

        </div>
<?php echo "<br><br>"; ?>
    <?php include("footer.php") ?>
    </section>
    
</body>
</html>